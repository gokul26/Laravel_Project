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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
