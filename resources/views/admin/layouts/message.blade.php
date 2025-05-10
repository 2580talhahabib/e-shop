@if (Session::has('success'))
<div class="alert alert-success text-center mb-2 ">
    {{ Session::get('success') }}
</div>
@endif
@if (Session::has('danger'))
<div class="alert alert-danger text-center mb-2">
    {{ Session::get('danger') }}
</div>
@endif