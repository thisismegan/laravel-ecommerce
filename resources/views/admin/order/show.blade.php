@extends('admin.template.default')
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@endpush
@section('title','Detail ')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-header">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $order->invoice }}</li>
                                <li class="list-group-item">{{ ucwords($order->address->name) }}</li>
                                <li class="list-group-item">{{ $order->address->phone }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                {{ $order->address->street.','.$order->address->sub_district  }}
                                <br>
                                {{ $order->address->city.','.$order->address->province  }}
                                <br>
                                {{ $order->address->country.','.$order->address->zip_code  }}
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        @if(!$order_confirm)
                        <div class="card-footer">
                            <div class="alert alert-warning">
                                <h4>Nomor Invoice: {{$order->invoice}} Belum Melakukan Pembayaran </h4>
                            </div>
                        </div>
                        @else
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <p>Status:</p>
                                <span class="badge @include('admin.order.status') ">{{ $order->status }} </span>
                            </li>
                        </ul>
                        @endif
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="category" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product</th>
                                <th>Image</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detail as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->product->title }}</td>
                                <td>
                                    <img class="img-thumbnail" style="width: 120px;" src="{{ $row->product->image() }}" alt="">
                                </td>
                                <td>{{ $row->qty }}</td>
                                <td>Rp{{ number_format($row->subtotal,2,',','.')  }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-right" colspan="4">Total:</td>
                                <td><strong>Rp{{ number_format($detail->sum('subtotal'),2,',','.') }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <a href="{{ route('admin.order.index') }}" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            @if($order_confirm)
            <div class="card">
                <div class="card-header">
                    <h5>Bukti Pembayaran</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('storage/'.$order_confirm->image) }}" class="img-thumbnail" style="width: 120px;">
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $order_confirm->account_name }}</li>
                                <li class="list-group-item">{{ $order_confirm->account_number }}</li>
                                <li class="list-group-item">Rp{{ number_format($order_confirm->nominal,2,',','.') }}</li>
                                <li class="list-group-item">{{ $order_confirm->note }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endsection