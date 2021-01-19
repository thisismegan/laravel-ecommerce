@extends('user.template.default')
@section('title','Add Address')
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
                    <h3 class="text-center">Add Address</h3>
                    <div class="page">
                        @include('user.template.partial.add_address')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection