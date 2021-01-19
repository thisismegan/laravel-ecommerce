@extends('admin.template.default')
@section('title','Dashboard')

@section('content')
@push('css')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

@endpush
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $all_orders->count() }}</h3>

                    <p>All Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('admin.order.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $product->count() }}</h3>

                    <p>Product</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pricetag"></i>
                </div>
                <a href="{{ route('admin.product.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $user->count() }}</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('admin.user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Chart Penjualan Januari-Desember 2021</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="myChart" style="width: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('js/chart/Chart.bundle.min.js') }}"></script>
<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'],
            datasets: [{
                label: 'Penjualan',
                data: [
                    <?= $all_orders->whereBetween('created_at', ['2021-01-01', '2021-01-31'])->count();  ?>,
                    <?= $all_orders->whereBetween('created_at', ['2021-02-01', '2021-02-28'])->count();  ?>,
                    <?= $all_orders->whereBetween('created_at', ['2021-03-01', '2021-03-31'])->count();  ?>,
                    <?= $all_orders->whereBetween('created_at', ['2021-04-01', '2021-04-30'])->count();  ?>,
                    <?= $all_orders->whereBetween('created_at', ['2021-05-01', '2021-05-31'])->count();  ?>,
                    <?= $all_orders->whereBetween('created_at', ['2021-06-01', '2021-06-30'])->count();  ?>,
                    <?= $all_orders->whereBetween('created_at', ['2021-07-01', '2021-07-31'])->count();  ?>,
                    <?= $all_orders->whereBetween('created_at', ['2021-08-01', '2021-08-31'])->count();  ?>,
                    <?= $all_orders->whereBetween('created_at', ['2021-09-01', '2021-09-30'])->count();  ?>,
                    <?= $all_orders->whereBetween('created_at', ['2021-10-01', '2021-10-31'])->count();  ?>,
                    <?= $all_orders->whereBetween('created_at', ['2021-11-01', '2021-11-30'])->count();  ?>,
                    <?= $all_orders->whereBetween('created_at', ['2021-12-01', '2021-12-31'])->count();  ?>,
                ],
                backgroundColor: [
                    <?php for ($i = 1; $i <= 12; $i++) : ?>
                        <?= "'rgba(255, 99, 132, 0.2)',"; ?>
                    <?php endfor ?>
                ],
                borderColor: [
                    <?php for ($i = 1; $i <= 12; $i++) : ?>
                        <?php echo "'rgba(255,99,132,1)',"; ?>
                    <?php endfor ?>
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


@endpush