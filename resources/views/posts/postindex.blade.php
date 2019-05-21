@extends('layouts.app')

@section('content')
<h1>Posts</h1>
    @if(count($posts)>0)
        @foreach ($posts as $post)
            <div class="well">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <div>
                {!!$post->body!!}-
                {{$post->created_at}}
            </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <h4>NO POST FOUND</h4>
    @endif
    
@endsection