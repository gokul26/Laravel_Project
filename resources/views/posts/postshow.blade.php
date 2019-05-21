@extends('layouts.app')

@section('content')
    <div class="well">
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h3>{{$post->title}}</h3>
    <small>Written on - {{$post->created_at}}</small>
    <div>
        {{$post->body}}
    </div>
    <a class="btn btn-sm btn-primary" href="/posts/{{$post->id}}/edit">Edit</a>
    {!!Form::open(['action'=>['PostController@destroy', $post->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    {!!Form::close()!!}
    </div>
    
@endsection