<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $conversations = $this->getUserConversations($user);
        $activeConversation = $conversations->first();
        $messages = collect();

        if ($activeConversation) {
            $messages = $activeConversation->messages()->with('sender')->get();
            $this->markAsRead($activeConversation, $user);
        }

        $guides = $this->getGuides($user);

        [$desktopView, $mobileListView] = $this->resolveViews($user);

        return view(
            $request->attributes->get('isMobile') ? $mobileListView : $desktopView,
            compact('conversations', 'activeConversation', 'messages', 'guides')
        );
    }

    public function show(Request $request, Conversation $conversation)
    {
        $user = auth()->user();
        $this->gate($user, $conversation);

        $conversations = $this->getUserConversations($user);
        $guides = $this->getGuides($user);
        $messages = $conversation->messages()->with('sender')->get();
        $activeConversation = $conversation;
        $this->markAsRead($conversation, $user);

        [$desktopView] = $this->resolveViews($user);
        $mobileChatView = $user->role === 'employer'
            ? 'mobile-first.employer.chat'
            : 'mobile-first.guide.chat';

        return view(
            $request->attributes->get('isMobile') ? $mobileChatView : $desktopView,
            compact('conversations', 'activeConversation', 'messages', 'guides')
        );
    }

    public function store(Request $request, Conversation $conversation)
    {
        $user = auth()->user();
        $this->gate($user, $conversation);

        $request->validate(['body' => 'required|string|max:5000']);

        $message = $conversation->messages()->create([
            'sender_id' => $user->id,
            'body'      => $request->body,
        ]);

        $conversation->update(['last_message_at' => now()]);

        return response()->json([
            'id'         => $message->id,
            'body'       => $message->body,
            'sender_id'  => $message->sender_id,
            'created_at' => $message->created_at->format('g:i A'),
            'is_mine'    => true,
        ]);
    }

    public function fetch(Request $request, Conversation $conversation)
    {
        $user = auth()->user();
        $this->gate($user, $conversation);

        $after = (int) $request->query('after', 0);

        $messages = $conversation->messages()
            ->where('id', '>', $after)
            ->get()
            ->map(fn($m) => [
                'id'         => $m->id,
                'body'       => $m->body,
                'sender_id'  => $m->sender_id,
                'created_at' => $m->created_at->format('g:i A'),
                'is_mine'    => $m->sender_id === $user->id,
            ]);

        $this->markAsRead($conversation, $user);

        return response()->json($messages);
    }

    public function startConversation(Request $request)
    {
        $user = auth()->user();

        abort_if($user->role !== 'employer', 403);

        $request->validate(['guide_id' => 'required|exists:users,id']);

        $conversation = Conversation::firstOrCreate(
            ['employer_id' => $user->id, 'guide_id' => $request->guide_id],
            ['last_message_at' => now()]
        );

        return redirect()->route('employer.message.show', $conversation);
    }

    // ── helpers ──────────────────────────────────────────────────────────────

    private function getUserConversations(User $user)
    {
        return Conversation::with(['employer', 'guide', 'lastMessage'])
            ->when($user->role === 'employer', fn($q) => $q->where('employer_id', $user->id))
            ->when($user->role === 'guide',    fn($q) => $q->where('guide_id',    $user->id))
            ->orderByDesc('last_message_at')
            ->get();
    }

    private function markAsRead(Conversation $conversation, User $user): void
    {
        $conversation->messages()
            ->where('sender_id', '!=', $user->id)
            ->where('is_read', false)
            ->update(['is_read' => true, 'read_at' => now()]);
    }

    private function gate(User $user, Conversation $conversation): void
    {
        abort_if(
            $user->id !== $conversation->employer_id && $user->id !== $conversation->guide_id,
            403
        );
    }

    private function getGuides(User $user)
    {
        return $user->role === 'employer'
            ? User::where('role', 'guide')->orderBy('name')->get(['id', 'name'])
            : collect();
    }

    private function resolveViews(User $user): array
    {
        return $user->role === 'employer'
            ? ['desktop.employer.message', 'mobile-first.employer.message']
            : ['desktop.guide.message',    'mobile-first.guide.message'];
    }
}
