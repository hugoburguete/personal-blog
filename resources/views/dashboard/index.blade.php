@extends('layout')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recent Posts</div>
                    <a href="{{ route('post.create') }}">Create new post</a>
                    <a href="{{ route('category.create') }}">Create new category</a>

                    @forelse ($recentArticles as $post)
                        @include('dashboard.post.listing.article', ['post' => $post])
                    @empty
                        @include('post.empty')
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
