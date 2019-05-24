@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <span class="pull-right">
                        <a href="/posts/create" class="btn btn-sm btn-primary">Create Posts</a>
                    </span>
                    <h4>Your Posts</h4>
                @if(count($posts) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>
                                    <a href="/posts/{{$post->id}}/edit" class="btn btn-sm btn-default">Edit</a>
                                    {!!Form::open(['url' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p>You have no posts</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
