
@extends('layout')
@section('content')
@include('partials._search')
<h2>{{$listings['title']}}<h2> 
    <p>{{$listings['description']}}</p>
    <x-card class="mt-4 -2 flex space-x-6">
        <a href="/list/{{$listings->id}}/edit">
    <i class="fa-solid fa-pencil"></i>Edit
        </a>
    </x-card>

    <x-card class="mt-4 -2 flex space-x-6">
        <a href="/delete/{{$listings->id}}">
    <i class="fa-solid fa-trash"></i>Delete
        </a>
    </x-card>

@endsection