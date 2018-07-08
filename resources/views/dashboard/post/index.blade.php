@extends('layout')

@section('content')
	<a href="{{ route('post.create') }}">Create New Post</a>
	@foreach ($posts as $post)
		@include('dashboard.post.components.article', ['post' => $post])
	@endforeach
@endsection