@extends('layout')
@section('content')
    <p>Name</p><h6>{{$data['name']}}</h6>
    <p>Address</p><h6>{{$data['address']}}</h6>
    <p>Phone</p><h6>{{$data['phone']}}</h6>
    <p>E-mail</p><h6>{{$data['email']}}</h6>
@endsection