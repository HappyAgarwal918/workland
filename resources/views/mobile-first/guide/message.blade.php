@extends('layouts.mobile-guide')
@section('title', 'Workland - Messages')
@section('page-title', 'Messages')

@section('content')
@forelse($conversations as $conv)
  @php $other = $conv->employer; $last = $conv->lastMessage; @endphp
  <a href="{{ route('guide.message.show', $conv) }}" class="text-decoration-none text-dark">
    <div class="d-flex align-items-center p-3 border-bottom">
      <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center me-3 fw-bold flex-shrink-0"
           style="width:50px;height:50px;font-size:20px;">
        {{ strtoupper(substr($other->name, 0, 1)) }}
      </div>
      <div class="flex-grow-1 overflow-hidden">
        <div class="d-flex justify-content-between align-items-center">
          <h6 class="mb-0 text-truncate">{{ $other->name }}</h6>
          @if($conv->last_message_at)
            <small class="text-muted flex-shrink-0 ms-2">{{ $conv->last_message_at->diffForHumans(null, true) }}</small>
          @endif
        </div>
        <small class="text-muted text-truncate d-block">
          {{ $last ? Str::limit($last->body, 42) : 'Start a conversation' }}
        </small>
      </div>
      <i class="fas fa-chevron-right text-muted ms-2"></i>
    </div>
  </a>
@empty
  <div class="text-center text-muted py-5">
    <i class="fas fa-comments fa-3x mb-3 d-block opacity-25"></i>
    <p>No conversations yet.</p>
    <p class="small">Employers will reach out when they need a guide.</p>
  </div>
@endforelse
@endsection
