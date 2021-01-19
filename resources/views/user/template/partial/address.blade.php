<li class="address">
    <div class="panel panel--address">
        <div class="panel-body">
            <ul class="address-details address-details--postal">
                <li>
                    <i class="fa fa-user"></i>
                    <dt class="address-label">Name:</dt>
                    {{ $address->name }}
                </li>
                <li>
                    <i class="fa fa-home"></i>
                    <dt class="address-label">Address:</dt>
                    {{ $address->street}}
                </li>
                <li>
                    {{$address->sub_district.','.$address->city.','.$address->province}}
                </li>
                <li>{{ $address->country.','.$address->zip_code }}</li>
            </ul>
            <dl class="address-details">
                <dt class="address-label">Phone:</dt>
                <dd class="address-description">{{ $address->phone }}</dd>
            </dl>
            <div class="form-actions">
                <a class="button button--primary button--small" href="{{ route('address.edit',$address->id) }}">Edit</a>
                </form>
            </div>
        </div>
    </div>
</li>