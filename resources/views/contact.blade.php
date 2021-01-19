@extends('user.template.default')
@section('title','Contact Us')
@section('content')
<style>
    .text-red {
        color: red !important;
    }
</style>
<div class="body stop-float-body">
    <div class="apframe-main">
        <div class="container">
            <main class="page">
                <h1 class="page-heading">Contact Us</h1>
                <div class="page-content page-content--centered">
                    <p></p>
                    <p>Silahkan kontak kami jika ada masalah pada pesanan anda.</p>
                    <p></p>
                    <form class="form" action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="form-row form-row--half">
                            <div class="form-field">
                                <label class="form-label" for="contact_fullname">Full Name</label>
                                <input class="form-input" type="text" name="name">
                                @error('name')
                                <p class="text-red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-field">
                                <label class="form-label" for="contact_phone">Phone Number</label>
                                <input class="form-input" type="text" name="phone">
                                @error('phone')
                                <p class="text-red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-field">
                                <label class="form-label" for="coemail">Email Address</label>
                                <input class="form-input" type="email" name="email">
                                @error('email')
                                <p class="text-red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-field">
                                <label class="form-label" for="contact_orderno">Invoice</label>
                                <input class="form-input" type="text" name="invoice">
                                @error('invoice')
                                <p class="text-red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-field">
                            <label class="form-label" for="contact_question">Comments/Questions</label>
                            <textarea name="comment" rows="5" cols="50" class="form-input"></textarea>
                            @error('comment')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-actions">
                            <button class="button button--primary" type="submit">Submit</button>
                        </div>
                    </form>

                </div>

            </main>
        </div>
    </div>
</div>
@endsection