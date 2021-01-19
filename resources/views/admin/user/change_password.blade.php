@extends('admin.template.default')
@section('title','Change Password')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            @include('admin.template.notif')
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Change Password</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('admin.update_password') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Old Password</label>
                            <div class="col-sm-8">
                                <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Old Password">
                                @error('old_password')
                                <p class="text-red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">New Password</label>
                            <div class="col-sm-8">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password">
                                @error('password')
                                <p class="text-red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Confirmation Password</label>
                            <div class="col-sm-8">
                                <input type="password" name="password_confirmation" class="form-control @error('conf_password') is-invalid @enderror" placeholder="Password Confirmation">
                                @error('password_confirmation')
                                <p class="text-red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Save</button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-default float-right">Cancel</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection