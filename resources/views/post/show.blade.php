@extends('layout')

@section('site_meta')
	
@endsection

@section('content')
	<article class="article article-{{ $post->slug }} article-{{ $post->id }}">
		<div class="container">
			<header>
				<h1>{{ $post->title }}</h1>
				<p class="short-description"><i>{!! strip_tags($post->short_description) !!}</i></p>
				<p class="date"><small>Published at: {{ $post->created_at->format('jS M Y') }}</small></p>
			</header>
		</div>

		<div class="thumbnail-container">
			@include('components.image', [
				'size' => '1280x500',
				'post' => $post,
			])
		</div>

		<div class="container">

			{!! $post->content !!}

			<footer>
				
			</footer>
		</div>
	</article>
@endsection