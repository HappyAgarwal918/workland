@extends('layouts.mobile-guide')
@section('title', 'Workland - Chat')
@section('page-title', $activeConversation->employer->name)

@section('styles')
<style>
#chatMessages { padding-bottom: 140px; }
.msg-mine  { background:#0d6efd; color:#fff; border-radius:18px 18px 4px 18px; }
.msg-other { background:#fff; border:1px solid #dee2e6; border-radius:18px 18px 18px 4px; }
.send-bar  { position:fixed; bottom:70px; left:0; right:0; background:#fff; border-top:1px solid #dee2e6; padding:10px 15px; z-index:200; }
</style>
@endsection

@section('content')
<div class="mb-3">
  <a href="{{ route('guide.message') }}" class="btn btn-sm btn-outline-secondary">
    <i class="fas fa-arrow-left me-1"></i> Back
  </a>
</div>

<div id="chatMessages">
  @forelse($messages as $msg)
    @if($msg->sender_id === auth()->id())
      <div class="mb-3 text-end">
        <div class="d-inline-block msg-mine p-2 px-3" style="max-width:82%;">{{ $msg->body }}</div>
        <div><small class="text-muted">{{ $msg->created_at->format('g:i A') }}</small></div>
      </div>
    @else
      <div class="mb-3">
        <div class="d-inline-block msg-other p-2 px-3" style="max-width:82%;">{{ $msg->body }}</div>
        <div><small class="text-muted">{{ $msg->created_at->format('g:i A') }}</small></div>
      </div>
    @endif
  @empty
    <p class="text-center text-muted small py-4">No messages yet. Say hello!</p>
  @endforelse
</div>

<div class="send-bar">
  <form id="sendForm" class="d-flex gap-2">
    @csrf
    <input type="text" id="msgInput" class="form-control" placeholder="Type a message..." autocomplete="off">
    <button type="submit" class="btn btn-primary">
      <i class="fas fa-paper-plane"></i>
    </button>
  </form>
</div>
@endsection

@section('scripts')
<script>
const SEND_URL  = @json(route('guide.message.send',  $activeConversation));
const FETCH_URL = @json(route('guide.message.fetch', $activeConversation));
let lastId = {{ $messages->isNotEmpty() ? $messages->last()->id : 0 }};

function esc(s) {
  return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
}

function bubble(msg) {
  return msg.is_mine
    ? `<div class="mb-3 text-end"><div class="d-inline-block msg-mine p-2 px-3" style="max-width:82%;">${esc(msg.body)}</div><div><small class="text-muted">${msg.created_at}</small></div></div>`
    : `<div class="mb-3"><div class="d-inline-block msg-other p-2 px-3" style="max-width:82%;">${esc(msg.body)}</div><div><small class="text-muted">${msg.created_at}</small></div></div>`;
}

function scrollBottom() {
  window.scrollTo(0, document.body.scrollHeight);
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
});
</script>
@endsection
