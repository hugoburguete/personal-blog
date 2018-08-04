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
									@include(
										'components.image', 
										[
											'post' => $post,
											'alt' => 'Slider image for ' . $post->title,
											'size' => '900x500',
										]
									)
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
							@include('post.listing.article', [
								'post' => $featuredArticle,
									'columnClass' => 'col-12',
								])
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="card-listing row">
			@forelse ($otherArticles as $post)
				@include('post.listing.article', ['post' => $post])
			@empty
				@include('post.empty')
			@endforelse
		</div>
	</div>
@endsection