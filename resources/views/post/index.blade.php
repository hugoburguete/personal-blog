@extends('layout')

@section('content')
	@foreach ($posts as $post)
		@include('post.listing.article', ['post' => $post])
	@endforeach
@endsection