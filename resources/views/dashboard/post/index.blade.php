@extends('layout')

@section('content')
    <a href="{{ route('post.create') }}">Create new post</a>
    <a href="{{ route('category.create') }}">Create new category</a>
	@foreach ($posts as $post)
		@include('dashboard.post.listing.article', ['post' => $post])
	@endforeach
@endsection