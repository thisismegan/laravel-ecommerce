@extends('user.template.default')
@section('title','Account Setting')
@section('content')
<div class="account-body">
    <br>
    <div class="body  stop-float-body">
        @include('user.template.partial.nav_profil')
        <div class="apframe-main">
            <div class="container">
                <div class="account account--fixed">
                    <div class="page">
                        <form action="{{ route('user.update',$profil->id) }}" class="form" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <fieldset class="form-fieldset">
                                <div class="form-row form-row--half">
                                    <div class="form-field form-field--input form-field--inputText">
                                        <label class="form-label">
                                            Name
                                        </label>
                                        <input type="text" class="form-input" name="name" value="{{ $profil->name }}">
                                        @error('name')
                                        <p class="text-red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-field form-field--input form-field--inputText">
                                        <label class="form-label">
                                            Email
                                        </label>
                                        <input type="text" class="form-input" name="email" value="{{ $profil->email }}" readonly>
                                    </div>
                                    <div class="form-field form-field--input form-field--inputText">
                                        <label class="form-label" for="account_companyname">
                                            Image
                                        </label>
                                        <img src="{{ $profil->image() }}" alt="" style="width:120px">
                                        <br>
                                        <input type="file" name="image" class="form-input" id="">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-actions">
                                <button class="button button--primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection