@if (session('success'))
<button class="button button--primary">
    {{ session('success') }}
</button>
@endif
@if (session('warning'))
<button class="button button--primary">
    {{ session('warning') }}
</button>
@endif