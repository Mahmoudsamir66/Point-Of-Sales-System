
@if ($message = Session::get('success'))

    <div class="alert alert-success">
        <strong></strong> {{Session::get('success')}}
    </div>
@endif
