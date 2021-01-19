<style>
    .text-red {
        color: crimson !important;
    }
</style>

@extends('user.template.default')
@section('title','Order Confirm')
@section('content')
<div class="account-body">
    <br>
    <div class="body  stop-float-body">
        <div class="apframe-main">
            <div class="container">
                <div class="account account--fixed">
                    <h3 class="text-center">Your Invoice: {{ $order->invoice }}</h3>
                    <br>
                    <div class="page">
                        <form action="{{ route('order.order_confirm') }}" class="form" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <fieldset class="form-fieldset">
                                <div class="form-row form-row--half">
                                    <div class="form-field form-field--input form-field--inputText">
                                        <label class="form-label">
                                            Account Name
                                        </label>
                                        <input type="text" class="form-input" name="account_name" value="{{ old('account_name') }}">
                                        @error('account_name')
                                        <p class="text-red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-field form-field--input form-field--inputText">
                                        <label class="form-label">
                                            Account Number
                                        </label>
                                        <input type="text" class="form-input" name="account_number" value="{{ old('account_number') }}">
                                        @error('account_number')
                                        <p class="text-red">{{ $message }}</p>
                                        @enderror
                                        <span style="display: none;"></span>
                                    </div>
                                    <div class="form-field form-field--input form-field--inputText">
                                        <label class="form-label">
                                            Nominal
                                        </label>
                                        <input type="text" class="form-input" name="nominal" value="{{ old('nominal') }}">
                                        @error('nominal')
                                        <p class="text-red">{{ $message }}</p>
                                        @enderror
                                        <span style="display: none;"></span>
                                    </div>
                                    <div class="form-field form-field--input form-field--inputText">
                                        <label class="form-label">
                                            Note
                                        </label>
                                        <textarea type="text" rows="3" class="form-input" name="note">{{ old('note') }}</textarea>
                                    </div>
                                    <div class="form-field form-field--input form-field--inputText">
                                        <label class="form-label" for="account_companyname">
                                            Proof of Payment
                                        </label>
                                        <input type="file" name="image" class="form-input" id="">
                                        @error('image')
                                        <p class="text-red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-actions">
                                <button class="button button--primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection