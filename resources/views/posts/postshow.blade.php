@extends('layouts.app')

@section('content')
    <div class="well">
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h3>{{$post->title}}</h3>
    <small>Posted on - {{$post->created_at}} by {{$post->user_id}}</small>
    <div>
        {!! $post->body !!}
    </div>
    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['url' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
    </div>
    
@endsection