<!-- header css -->
@include('user.template.partial.head')

<!-- pop up -->
@include('user.template.partial.popup')
<!-- snippet location header -->

<p id="back-top">
    <a href="#top" title="Scroll To Top">Scroll To Top</a>
</p>
<!-- header top -->
@include('user.template.partial.header-top')
<!-- header bottom -->
@if(Request::path()==='/')
@include('user.template.partial.header-bottom')
@else

@endif

@yield('content')
<!-- footer -->
@include('user.template.partial.footer')
<!-- scripts -->
@include('user.template.partial.scripts')