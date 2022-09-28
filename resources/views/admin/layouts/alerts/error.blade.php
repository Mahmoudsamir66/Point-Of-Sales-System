
@if ($message = Session::get('error'))

    <div class="alert alert-danger">
        <strong></strong> {{Session::get('error')}}
    </div>
@endif
