<form action="{{ route('address.store') }}" class="form" method="post">
    @csrf
    <fieldset class="form-fieldset">
        <div class="form-row form-row--half">
            <div class="form-field">
                <input class=" form-input @error('fullname') is-invalid @enderror" name="fullname" type="text" value="{{ old('fullname') }}" autofocus placeholder="Fullname">
                @error('fullname')
                <span class="invalid-feedback text-red" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-field">
                <input class=" form-input @error('phone') is-invalid @enderror" name="phone" type="text" placeholder="Phone Number" value="{{ old('phone') }}">
                @error('phone')
                <span class="invalid-feedback text-red" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-field">
                <input class=" form-input @error('country') is-invalid @enderror" name="country" type="text" value="{{ old('country') }}" placeholder="Country">
                @error('country')
                <span class="invalid-feedback text-red" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-field">
                <input class=" form-input @error('province') is-invalid @enderror" name="province" type="text" value="{{ old('province') }}" placeholder="Province">
                @error('province')
                <span class="invalid-feedback text-red" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-field">
                <input class=" form-input @error('city') is-invalid @enderror" name="city" type="text" value="{{ old('city') }}" placeholder="City">
                @error('city')
                <span class="invalid-feedback text-red" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-field">
                <input class=" form-input @error('sub_district') is-invalid @enderror" name="sub_district" type="text" value="{{ old('sub_district') }}" placeholder="Sub-District">
                @error('sub_district')
                <span class="invalid-feedback text-red" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-field">
                <input class=" form-input @error('zip_code') is-invalid @enderror" name="zip_code" type="text" value="{{ old('zip_code') }}" placeholder="Zip Code">
                @error('zip_code')
                <span class="invalid-feedback text-red" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-field">
                <textarea rows="4" class=" form-input @error('address') is-invalid @enderror" name="address" type="text" placeholder="Address Line">{{ old('address') }}</textarea>
                @error('address')
                <span class="invalid-feedback text-red" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-actions">
                <button type="submit" class="button button--primary">Save</button>
                <a href="{{ route('address.index') }}" class="button button--secondary">Cancel</a>
            </div>
        </div>
    </fieldset>
</form>