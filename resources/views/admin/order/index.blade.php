@extends('admin.template.default')
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@endpush
@section('title','Order')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @include('admin.template.notif')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Order</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="order" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Invoice</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Opsi</th>
                                <th>Resi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('script')
    <!-- DataTables -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

    <script>
        $(function() {
            $('#order').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.data-order') }}",
                columns: [{

                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'invoice'

                    },
                    {
                        data: 'total'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'action'
                    },
                    {
                        data: 'resi'
                    },
                ],
            })

        })
    </script>


    @endpush