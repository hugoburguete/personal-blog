@extends('layout')

@section('content')
	<a href="{{ route('post.create') }}">Create New Post</a>
	@foreach ($posts as $post)
		@include('dashboard.post.listing.article', ['post' => $post])
	@endforeach
@endsection