@extends('layouts.app')

@section('content')
    <div class="well">
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h3>{{$post->title}}</h3>
    <div class="col-sm-4 col-md-4">
    <img class="img-thumbnail" style="max-width:100px; height:100px;" src="/storage/cover_images/{{$post->cover_image}}">
    </div>
    <div class="col-sm-8 col-md-8">
        {!! $post->body !!}
        <small>Posted on - {{$post->created_at}} by {{$post->user_id}}</small>
    </div>
    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
    </div>
    
@endsection