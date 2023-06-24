@if (session('success'))
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
      <div class="toast-header">
        <strong class="me-auto text-primary"><i class="bi bi-info-circle"></i> Info</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        {!! session('success') !!}
      </div>
    </div>
</div>
@endif

@if (session('warning'))
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
      <div class="toast-header">
        <strong class="me-auto text-warning"><i class="bi bi-exclamation-circle"></i> Warning</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        {!! session('warning') !!}
      </div>
    </div>
</div>
@endif

@if (session('danger'))
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
      <div class="toast-header">
        <strong class="me-auto text-danger"><i class="bi bi-x-circle"></i> Error</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        {!! session('danger') !!}
      </div>
    </div>
</div>
@endif

@if ($errors->any())
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
      <div class="toast-header">
        <strong class="me-auto text-danger"><i class="bi bi-x-circle"></i> Greška</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        @foreach ($errors->all() as $error)
        {{ $error }}<br>
        @endforeach
      </div>
    </div>
</div>
@endif