@extends('user.template.default')
@section('title','Edit Address')
@section('content')
<style>
    .text-red {
        color: crimson !important;
    }
</style>
<div class="account-body">
    <br>
    <div class="body  stop-float-body">
        @include('user.template.partial.nav_profil')
        <div class="apframe-main">
            <div class="container">
                <div class="account account--fixed">
                    <h3 class="text-center">Edit Address</h3>
                    <div class="page">
                        <form action="{{ route('address.update',$address->id) }}" class="form" method="POST">
                            @csrf
                            @method('patch')
                            <fieldset class="form-fieldset">
                                <div class="form-row form-row--half">
                                    <div class="form-field">
                                        <input class=" form-input @error('fullname') is-invalid @enderror" name="fullname" type="text" value="{{ $address->name }}" autofocus placeholder="Fullname">
                                        @error('fullname')
                                        <span class="invalid-feedback text-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <input class=" form-input @error('phone') is-invalid @enderror" name="phone" type="text" placeholder="Phone Number" value="{{ $address->phone }}">
                                        @error('phone')
                                        <span class="invalid-feedback text-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <input class=" form-input @error('country') is-invalid @enderror" name="country" type="text" value="{{ $address->country }}" placeholder="Country">
                                        @error('country')
                                        <span class="invalid-feedback text-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <input class=" form-input @error('province') is-invalid @enderror" name="province" type="text" value="{{ $address->province }}" placeholder="Province">
                                        @error('province')
                                        <span class="invalid-feedback text-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <input class=" form-input @error('city') is-invalid @enderror" name="city" type="text" value="{{ $address->city }}" placeholder="City">
                                        @error('city')
                                        <span class="invalid-feedback text-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <input class=" form-input @error('sub_district') is-invalid @enderror" name="sub_district" type="text" value="{{ $address->sub_district }}" placeholder="Sub-District">
                                        @error('sub_district')
                                        <span class="invalid-feedback text-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <input class=" form-input @error('zip_code') is-invalid @enderror" name="zip_code" type="text" value="{{ $address->zip_code }}" placeholder="Zip Code">
                                        @error('zip_code')
                                        <span class="invalid-feedback text-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <textarea rows="4" class=" form-input @error('address') is-invalid @enderror" name="address" type="text" placeholder="Address Line">{{ $address->street }}</textarea>
                                        @error('address')
                                        <span class="invalid-feedback text-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="button button--primary">Update</button>
                                        <a href="{{ route('address.index') }}" class="button button--secondary">Cancel</a>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection