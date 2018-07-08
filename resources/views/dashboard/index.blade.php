@extends('layout')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>
                    <a href="{{ route('post.create') }}">Create Post</a>

                    @foreach ($recentArticles as $post)
                        @include('dashboard.post.components.article', ['post' => $post])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
