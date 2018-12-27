@extends('layout')

@section('footer_scripts')
@endsection

@section('content')
	<div class="container">
		<div class="card-listing">
			@forelse ($posts as $post)
				@include('post.listing.article', ['post' => $post])
			@empty
				@include('post.empty')
			@endforelse
		</div>
	</div>
@endsection