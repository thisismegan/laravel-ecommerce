<style>
    .text-red {
        color: red !important;
    }
</style>
@extends('user.template.default')
@section('title','login')
@section('content')
<div class="body  stop-float-body">
    <div class="apframe-main">
        <div class="container">
            <div class="login">
                <span class="square"></span>
                <h1 class="page-heading">Change Password</h1>
                <div class="login-row center">
                    <form class="login-form form" action="{{ route('update_password') }}" method="post">
                        @csrf
                        <div class="form-field">
                            <label class="form-label">Old Password:</label>
                            <input class=" form-input @error('email') is-invalid @enderror" name="old_password" type="password" value="{{ old('old_password') }}">
                            @error('old_password')
                            <span class="invalid-feedback text-red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-field">
                            <label class="form-label">New Password:</label>
                            <input class="form-input @error('password') is-invalid @enderror" type="password" name="password">
                            @error('password')
                            <span class="invalid-feedback text-red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-field">
                            <label class="form-label">Password Confirmation:</label>
                            <input class="form-input @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation">
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="button button--primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div id="modal" class="modal" data-reveal data-prevent-quick-search-close>
        <a href="#" class="modal-close" aria-label="Close" role="button">
            <span aria-hidden="true">&#215;</span>
        </a>
        <div class="modal-content"></div>
        <div class="loadingOverlay"></div>
    </div>
</div>
@endsection