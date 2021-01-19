@extends('admin.template.default')
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('asset/plugins/daterangepicker/daterangepicker.css')}}">
@endpush
@section('title','Report Data Order')

@section('content')
<div class="container">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Export Orders</div>
            <!-- <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <div class="input-group mb-3">
                            <form action="{{ route('admin.export.index') }}" method="GET" class="form-inline">
                                <span class="input-group-text">From</span>
                                <input type="date" class="form-control mr-2" name="start" id="from_date">
                                <span class="input-group-text">To</span>
                                <input type="date" class="form-control mr-2" name="end" id="date_to">
                                <button type="submit" class="btn btn-info" id="filter">Filter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="card-body">
                {!! $dataTable->table() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}

<script>
    $(function() {
        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker

    })
</script>
@endpush