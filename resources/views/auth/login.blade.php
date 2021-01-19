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
                <h1 class="page-heading">Sign in</h1>
                <div class="login-row">
                    <form class="login-form form" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-field">
                            <label class="form-label">Email Address:</label>
                            <input class=" form-input @error('email') is-invalid @enderror" name="email" type="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback text-red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-field">
                            <label class="form-label">Password:</label>
                            <input class="form-input @error('password') is-invalid @enderror" type="password" name="password">
                            @error('password')
                            <span class="invalid-feedback text-red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="button button--primary">Login</button>
                            <a class="forgot-password" href="{{ route('password.request') }}">Forgot your password?</a>
                        </div>
                    </form>
                    <div class="new-customer">
                        <div class="panel">
                            <div class="panel-header">
                                <h2 class="panel-title">New Customer?</h2>
                            </div>
                            <div class="panel-body">
                                <p class="new-customer-intro">Create an account with us and you&#x27;ll be able to:</p>
                                <ul class="new-customer-fact-list">
                                    <li class="new-customer-fact">Check out faster</li>
                                    <li class="new-customer-fact">Save multiple shipping addresses</li>
                                    <li class="new-customer-fact">Access your order history</li>
                                    <li class="new-customer-fact">Track new orders</li>
                                    <li class="new-customer-fact">Save items to your wish list</li>
                                </ul>
                                <a href="{{ route('register') }}"><button class="button button--primary">Create Account</button></a>
                            </div>
                        </div>
                    </div>
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