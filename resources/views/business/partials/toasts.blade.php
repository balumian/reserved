@if(session('success'))
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
  <div class="toast fade show" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-success text-white"><strong class="me-auto">Success</strong><small>Now</small>
      <button class="btn-close btn-close-white" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">{{session('success')}}</div>
  </div>
</div>
@endif

@if(session('error'))
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
  <div class="toast fade show" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-danger text-white"><strong class="me-auto">Error</strong><small>Now</small>
      <button class="btn-close btn-close-white" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">{{session('error')}}</div>
  </div>
</div>
@endif