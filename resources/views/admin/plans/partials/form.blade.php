<div class="bg-white rounded shadow-sm p-4" style="max-width:700px;">

  @if($errors->any())
    <div class="alert alert-danger mb-4">
      <ul class="mb-0">
        @foreach($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Name --}}
  <div class="mb-3">
    <label class="form-label fw-semibold">Plan Name <span class="text-danger">*</span></label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $plan->name ?? '') }}" placeholder="e.g. Single-Base Operator">
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  {{-- Price --}}
  <div class="mb-3">
    <label class="form-label fw-semibold">Annual Price (ISK) <span class="text-danger">*</span></label>
    <div class="input-group">
      <span class="input-group-text">ISK</span>
      <input type="number" name="price_yearly" class="form-control @error('price_yearly') is-invalid @enderror"
             value="{{ old('price_yearly', $plan->price_yearly ?? '') }}" min="0" step="100" placeholder="14900">
    </div>
    @error('price_yearly')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
  </div>

  {{-- Limits --}}
  <div class="row mb-3">
    <div class="col-md-6">
      <label class="form-label fw-semibold">Max Branches</label>
      <input type="number" name="max_branches" class="form-control"
             value="{{ old('max_branches', $plan->max_branches ?? '') }}" min="1" placeholder="Leave blank for unlimited">
      <div class="form-text">Leave blank for unlimited</div>
    </div>
    <div class="col-md-6">
      <label class="form-label fw-semibold">Max Bookings / Month</label>
      <input type="number" name="max_bookings_per_month" class="form-control"
             value="{{ old('max_bookings_per_month', $plan->max_bookings_per_month ?? '') }}" min="1" placeholder="Leave blank for unlimited">
      <div class="form-text">Leave blank for unlimited</div>
    </div>
  </div>

  {{-- Features (dynamic tag editor) --}}
  <div class="mb-3">
    <label class="form-label fw-semibold">Features</label>
    <div class="border rounded p-2 mb-2 d-flex flex-wrap gap-2" id="featureTags" style="min-height:48px;">
      {{-- Tags rendered here by JS --}}
    </div>
    <div class="input-group">
      <input type="text" id="featureInput" class="form-control" placeholder="Type a feature and press Enter or Add">
      <button type="button" class="btn btn-outline-secondary" id="addFeatureBtn">Add</button>
    </div>
    <div class="form-text">e.g. "Unlimited bookings", "Priority support"</div>
    {{-- Hidden inputs populated by JS --}}
    <div id="featureHiddenInputs"></div>
  </div>

  {{-- Options --}}
  <div class="row mb-4">
    <div class="col-md-4">
      <label class="form-label fw-semibold">Sort Order</label>
      <input type="number" name="sort_order" class="form-control"
             value="{{ old('sort_order', $plan->sort_order ?? 0) }}" min="0">
    </div>
    <div class="col-md-4 d-flex align-items-end">
      <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" name="is_featured" id="isFeatured" value="1"
               {{ old('is_featured', ($plan->is_featured ?? false)) ? 'checked' : '' }}>
        <label class="form-check-label fw-semibold" for="isFeatured">Mark as Featured</label>
      </div>
    </div>
  </div>

  {{-- Submit --}}
  <div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary px-4">Save Plan</button>
    <a href="{{ route('admin.plans.index') }}" class="btn btn-outline-secondary">Cancel</a>
  </div>

</div>

@push('scripts')
<script>
// Initial features from server (on edit page)
const initialFeatures = @json(old('features', isset($plan) ? $plan->features : []));

const tagsContainer    = document.getElementById('featureTags');
const hiddenContainer  = document.getElementById('featureHiddenInputs');
const featureInput     = document.getElementById('featureInput');
const addBtn           = document.getElementById('addFeatureBtn');

function renderTag(text) {
  const idx = Date.now() + Math.random();

  // hidden input
  const hidden = document.createElement('input');
  hidden.type  = 'hidden';
  hidden.name  = 'features[]';
  hidden.value = text;
  hidden.dataset.idx = idx;
  hiddenContainer.appendChild(hidden);

  // visible badge
  const tag = document.createElement('span');
  tag.className = 'badge bg-primary d-flex align-items-center gap-1 py-2 px-2';
  tag.style.fontSize = '.85rem';
  tag.innerHTML = `${escHtml(text)} <button type="button" class="btn-close btn-close-white btn-sm" style="font-size:.6rem;" data-idx="${idx}"></button>`;
  tag.querySelector('.btn-close').addEventListener('click', function () {
    document.querySelector(`input[data-idx="${this.dataset.idx}"]`).remove();
    tag.remove();
  });
  tagsContainer.appendChild(tag);
}

function escHtml(s) {
  return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

function addFeature() {
  const val = featureInput.value.trim();
  if (!val) return;
  renderTag(val);
  featureInput.value = '';
  featureInput.focus();
}

addBtn.addEventListener('click', addFeature);
featureInput.addEventListener('keydown', function (e) {
  if (e.key === 'Enter') { e.preventDefault(); addFeature(); }
});

// Render existing features on page load
initialFeatures.forEach(renderTag);
</script>
@endpush
