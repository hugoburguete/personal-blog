@extends('layout')

@section('site_meta')
	
@endsection

@section('content')
	<article class="article article-{{ $post->slug }} article-{{ $post->id }}">
		<div class="container">
			<header>
				<h1>{{ $post->title }}</h1>
			</header>

			{!! $post->content !!}

			<footer>
				
			</footer>
		</div>
	</article>
@endsection