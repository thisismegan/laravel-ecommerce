@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('failed'))
<div class="alert alert-danger">
    {{ session('failed') }}
</div>
@endif