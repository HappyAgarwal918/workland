@extends('layouts.mobile-employer')
@section('title', 'Workland - Messages')
@section('page-title', 'Messages')

@section('content')
{{-- Guide picker --}}
@if($guides->isNotEmpty())
<div class="mb-3">
  <button class="btn btn-primary w-100" type="button" data-bs-toggle="collapse" data-bs-target="#guidePicker">
    <i class="fas fa-plus me-2"></i> New Conversation
  </button>
  <div class="collapse mt-2 border rounded bg-white" id="guidePicker">
    <div class="p-2 border-bottom">
      <input type="text" id="guideSearch" class="form-control form-control-sm" placeholder="Search guides...">
    </div>
    <div style="max-height:240px;overflow-y:auto;" id="guideList">
      @foreach($guides as $guide)
        <form method="POST" action="{{ route('employer.message.start') }}">
          @csrf
          <input type="hidden" name="guide_id" value="{{ $guide->id }}">
          <button type="submit"
                  class="guide-entry w-100 d-flex align-items-center p-3 border-bottom bg-white border-0 text-start"
                  data-name="{{ strtolower($guide->name) }}">
            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3 fw-bold flex-shrink-0"
                 style="width:38px;height:38px;font-size:16px;">
              {{ strtoupper(substr($guide->name, 0, 1)) }}
            </div>
            <span>{{ $guide->name }}</span>
          </button>
        </form>
      @endforeach
    </div>
  </div>
</div>
@endif

@forelse($conversations as $conv)
  @php $other = $conv->guide; $last = $conv->lastMessage; @endphp
  <a href="{{ route('employer.message.show', $conv) }}" class="text-decoration-none text-dark">
    <div class="d-flex align-items-center p-3 border-bottom">
      <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3 fw-bold flex-shrink-0"
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
    <p class="small">Book a guide to start chatting.</p>
  </div>
@endforelse
@section('scripts')
<script>
$('#guideSearch').on('input', function () {
  const q = $(this).val().toLowerCase();
  $('.guide-entry').each(function () {
    $(this).closest('form').toggle($(this).data('name').includes(q));
  });
});
</script>
@endsection
