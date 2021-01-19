@extends('user.template.default')
@section('title','Homepage')
@section('content')
@foreach($product as $row)
@include('product-card')
@endforeach
@endsection