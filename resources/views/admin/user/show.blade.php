@extends('admin.template.default')
@section('title','Detail Produk')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ $user->image() }}" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ ucwords($user->name) }}</h3>

                    <p class="text-muted text-center"></p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Created</b> <a class="float-right">{{ date('l,d M Y',strtotime($user->created_at)) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Updated</b> <a class="float-right">{{ date('l,d M Y',strtotime($user->updated_at)) }}</a>
                        </li>
                    </ul>

                    <a href="" class="btn btn-primary btn-block"><b>Edit</b></a>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
        <!-- /.col -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#deskripsi" data-toggle="tab">Address</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <!-- /.tab-pane -->
                        <div class="tab-pane active" id="deskripsi">
                            <form class="form-horizontal" method="POST" action="{{ route('admin.user.update_address',$user->address->id) }}">
                                @csrf
                                @method('patch')
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Country</label>
                                    <div class="col-sm-10">
                                        <input name="country" type="text" class="form-control" value="{{ $user->address->country }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Province</label>
                                    <div class="col-sm-10">
                                        <input name="province" type="text" class="form-control" value="{{ $user->address->province }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">City</label>
                                    <div class="col-sm-10">
                                        <input name="city" type="text" class="form-control" value="{{ $user->address->city }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-2 col-form-label">District</label>
                                    <div class="col-sm-10">
                                        <input name="sub_district" type="text" class="form-control" value="{{ $user->address->sub_district }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Street</label>
                                    <div class="col-sm-10">
                                        <textarea name="street" class="form-control">{{ $user->address->street }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-2 col-form-label">Zip Code</label>
                                    <div class="col-sm-10">
                                        <input name="zip_code" type="text" class="form-control" value="{{ $user->address->zip_code }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input name="phone" type="text" class="form-control" value="{{ $user->address->phone }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-info">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection