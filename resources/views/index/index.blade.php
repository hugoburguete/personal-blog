@extends('layout')

@section('footer_scripts')
@endsection

@section('content')
	<?php 
		// Some helper variables
		$carouselIndexStart = 0;
		$carouselIndexEnd = 2;
		$i = 0;
	?>

	<div class="article-carousel-container">
		<div class="container">
			<div class="article-carousel">
				@while ($i < $carouselIndexEnd)
					<?php 
						$post = $posts[$i];
						$i++;
					?>
					<div>{{ $post->title }}</div>
				@endwhile
			</div>
		</div>
	</div>

	@forelse ($posts as $post)
		<div class="card-listing">
			@include('post.listing.article', ['post' => $post])
		</div>
	@empty
		@include('post.empty')
	@endforelse
@endsection