<style>
    .text-orange {
        color: coral !important;
    }
</style>
<nav class="navBar navBar--sub navBar--account">
    <ul class="navBar-section">
        <li class="navBar-item">
            <a class="navBar-action {{ Request::path()==='profil' ? 'text-orange':'' }}" href="{{ route('user.profil') }}">Account Setting</a>
        </li>
        <li class="navBar-item">
            <a class="navBar-action {{ Request::path()==='address' ? 'text-orange':'' }}" href="{{ route('address.index') }}">Address</a>
        </li>
    </ul>
</nav>