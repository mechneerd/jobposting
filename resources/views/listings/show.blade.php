
@extends('layout')
@section('content')
@include('partials._search')
<h2>{{$listings['title']}}<h2> 
    <p>{{$listings['description']}}</p>
@endsection