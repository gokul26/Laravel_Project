@extends('layouts.app')

@section('content')
    <div class="well">
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h3>{{$post->title}}</h3>
    <small>Written on - {{$post->created_at}}</small>
    <div>
        {{$post->body}}
    </div>
    </div>
    
@endsection