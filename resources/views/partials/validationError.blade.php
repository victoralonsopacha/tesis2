@if(session('error'))
    <div class="alert alert-dismissible alert-danger text-center">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ session('error') }}</strong>
    </div>
@endif
