@extends('layout')

@section('site_meta')
	
@endsection

@section('content')
	<article class="article article-{{ $post->slug }} article-{{ $post->id }}">
		<div class="container">
			<header>
				<h1>{{ $post->title }}</h1>
				<p class="short-description"><i>{!! strip_tags($post->short_description) !!}</i></p>
			</header>
		</div>

		<div class="thumbnail-container">
			@include('components.image', ['src' => '/img/php/php-1280x500.jpg'])
		</div>

		<div class="container">

			{!! $post->content !!}

			<footer>
				
			</footer>
		</div>
	</article>
@endsection