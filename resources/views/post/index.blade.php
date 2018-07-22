@extends('layout')

@section('content')
	@forelse ($posts as $post)
		<div class="card-listing">
			@include('post.listing.article', ['post' => $post])
		</div>
	@empty
		@include('post.empty')
	@endforelse
@endsection