@extends('layout')

@section('footer_scripts')
@endsection

@section('content')
	<?php 
		// Some helper variables
		$carouselIndexStart = 0;
		$carouselIndexEnd = 3;
		$carouselArticles = $posts->slice($carouselIndexStart, $carouselIndexEnd);
		$otherArticles = $posts->slice($carouselIndexEnd, $posts->count());
	?>

	<div class="carousel-articles-container">
		<div class="container">
			<div class="row">
				<div class="col-8">
					<div class="carousel-articles">
						@foreach ($carouselArticles as $post)
							<div class="carousel-article">
								<a href="{{ route('post.show', $post->slug) }}">
									<img class="thumbnail" 
										src="https://placehold.it/900x500" 
										alt="Slider image for {{ $post->title }}">
									<div class="legend">
										<h1 class="title">{{ $post->title }}</h1>
										<div class="description">
											{!! $post->short_description !!}
										</div>
									</div>
								</a>
							</div>
						@endforeach
					</div>
				</div>
				<div class="col-4">
					<h2>Top articles</h2>
					@foreach ($featured as $featuredArticle)
						<div class="featured-article">
							<h1>{{ $featuredArticle->title }}</h1>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	@forelse ($otherArticles as $post)
		<div class="card-listing">
			@include('post.listing.article', ['post' => $post])
		</div>
	@empty
		@include('post.empty')
	@endforelse
@endsection