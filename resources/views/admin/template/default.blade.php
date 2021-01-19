<!-- header css -->
@include('admin.template.partials.head')

<!-- Navbar -->
@include('admin.template.partials.navbar')

<!-- Main Sidebar Container -->
@include('admin.template.partials.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- breadcrumb-->
  @include('admin.template.partials.breadcrumb')
  <!-- /.breadcrumb -->
  <!-- Main content -->
  <section class="content">
    @yield('content')
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- footer js -->
@include('admin.template.partials.footer')