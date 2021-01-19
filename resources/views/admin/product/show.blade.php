@extends('admin.template.default')
@section('title','Detail Produk')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="img-fluid" src="{{ $product->image() }}" alt="User profile picture">
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#detail_product" data-toggle="tab">Detail</a></li>
                        <li class="nav-item"><a class="nav-link" href="#deskripsi" data-toggle="tab">Deskripsi</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="detail_product">
                            <!-- Post -->
                            <div class="post">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <h3>{{ $product->title }}</h3>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="alert-info">Rp{{ number_format($product->price,2,',','.') }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <p class="text-red">{{ $product->qty }}</p>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.post -->

                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="deskripsi">
                            {!! $product->description !!}
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-info">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection