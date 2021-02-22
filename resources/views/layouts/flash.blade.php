@if ($message = \Illuminate\Support\Facades\Session::get('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = \Illuminate\Support\Facades\Session::get('error'))
    <div class="alert alert-danger" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@endif
