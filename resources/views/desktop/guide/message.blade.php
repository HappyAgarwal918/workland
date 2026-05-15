@extends('layouts.guide-dashboard')
@section('title', 'Workland - Messages')
@section('page-title', 'Messages')

@section('styles')
<style>
.chat-messages { height: calc(70vh - 130px); overflow-y: auto; }
.chat-item { cursor: pointer; transition: background .15s; text-decoration: none; color: inherit; }
.chat-item:hover { background: #f8f9fa; }
.chat-item.active { background: #eef2ff; border-left: 3px solid #0d6efd; }
.av { width:44px; height:44px; min-width:44px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:600; }
.msg-mine  { background:#0d6efd; color:#fff; border-radius:18px 18px 4px 18px; }
.msg-other { background:#fff; border:1px solid #dee2e6; border-radius:18px 18px 18px 4px; }
</style>
@endsection

@section('content')
<div class="bg-white rounded shadow-sm">
  <div class="row g-0" style="height:70vh;">

    {{-- Conversation list --}}
    <div class="col-md-4 border-end d-flex flex-column">
      <div class="p-3 border-bottom">
        <input type="text" id="searchConv" class="form-control" placeholder="Search...">
      </div>
      <div class="overflow-auto flex-grow-1">
        @forelse($conversations as $conv)
          @php $other = $conv->employer; $last = $conv->lastMessage; @endphp
          <a href="{{ route('guide.message.show', $conv) }}"
             class="chat-item d-flex align-items-center p-3 border-bottom
                    @if($activeConversation && $activeConversation->id === $conv->id) active @endif"
             data-name="{{ strtolower($other->name) }}">
            <div class="av bg-success text-white me-3">
              {{ strtoupper(substr($other->name, 0, 1)) }}
            </div>
            <div class="overflow-hidden">
              <h6 class="mb-0 text-truncate">{{ $other->name }}</h6>
              <small class="text-muted text-truncate d-block">
                {{ $last ? Str::limit($last->body, 38) : 'Start a conversation' }}
              </small>
            </div>
          </a>
        @empty
          <div class="p-4 text-center text-muted small">No conversations yet.</div>
        @endforelse
      </div>
    </div>

    {{-- Chat window --}}
    <div class="col-md-8 d-flex flex-column">
      @if($activeConversation)
        @php $other = $activeConversation->employer; @endphp
        <div class="p-3 border-bottom d-flex align-items-center">
          <div class="av bg-success text-white me-3">
            {{ strtoupper(substr($other->name, 0, 1)) }}
          </div>
          <h6 class="mb-0">{{ $other->name }}</h6>
        </div>

        <div class="flex-grow-1 p-3 chat-messages" id="chatMessages" style="background:#f8f9fa;">
          @foreach($messages as $msg)
            @if($msg->sender_id === auth()->id())
              <div class="mb-3 text-end">
                <div class="d-inline-block msg-mine p-2 px-3" style="max-width:70%;">{{ $msg->body }}</div>
                <div><small class="text-muted">{{ $msg->created_at->format('g:i A') }}</small></div>
              </div>
            @else
              <div class="mb-3">
                <div class="d-inline-block msg-other p-2 px-3" style="max-width:70%;">{{ $msg->body }}</div>
                <div><small class="text-muted">{{ $msg->created_at->format('g:i A') }}</small></div>
              </div>
            @endif
          @endforeach
        </div>

        <div class="p-3 border-top">
          <form id="sendForm" class="d-flex gap-2">
            @csrf
            <input type="text" id="msgInput" class="form-control" placeholder="Type a message..." autocomplete="off">
            <button type="submit" class="btn btn-primary px-4">Send</button>
          </form>
        </div>
      @else
        <div class="d-flex align-items-center justify-content-center h-100 text-muted">
          <div class="text-center">
            <i class="fa fa-comments fa-3x mb-3 opacity-25"></i>
            <p>Select a conversation to start chatting</p>
          </div>
        </div>
      @endif
    </div>

  </div>
</div>
@endsection

@section('scripts')
@if($activeConversation)
<script>
const SEND_URL  = @json(route('guide.message.send',  $activeConversation));
const FETCH_URL = @json(route('guide.message.fetch', $activeConversation));
let lastId = {{ $messages->isNotEmpty() ? $messages->last()->id : 0 }};

function esc(s) {
  return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
}

function bubble(msg) {
  return msg.is_mine
    ? `<div class="mb-3 text-end"><div class="d-inline-block msg-mine p-2 px-3" style="max-width:70%;">${esc(msg.body)}</div><div><small class="text-muted">${msg.created_at}</small></div></div>`
    : `<div class="mb-3"><div class="d-inline-block msg-other p-2 px-3" style="max-width:70%;">${esc(msg.body)}</div><div><small class="text-muted">${msg.created_at}</small></div></div>`;
}

function scrollBottom() {
  const el = document.getElementById('chatMessages');
  el.scrollTop = el.scrollHeight;
}

$(function () {
  scrollBottom();

  $('#sendForm').on('submit', function (e) {
    e.preventDefault();
    const body = $('#msgInput').val().trim();
    if (!body) return;
    $.post(SEND_URL, { body, _token: $('input[name=_token]').val() }, function (msg) {
      $('#chatMessages').append(bubble(msg));
      lastId = msg.id;
      scrollBottom();
      $('#msgInput').val('');
    });
  });

  setInterval(function () {
    $.get(FETCH_URL + '?after=' + lastId, function (msgs) {
      msgs.forEach(function (msg) {
        $('#chatMessages').append(bubble(msg));
        lastId = msg.id;
      });
      if (msgs.length) scrollBottom();
    });
  }, 5000);

  $('#searchConv').on('input', function () {
    const q = $(this).val().toLowerCase();
    $('.chat-item').each(function () {
      $(this).toggle($(this).data('name').includes(q));
    });
  });
});
</script>
@endif
@endsection
