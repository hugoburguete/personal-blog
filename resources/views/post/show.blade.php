@extends('layout')

@section('content')
	<article class="card card-article">
		<header>
			<h1>{{ $post->title }}</h1>
		</header>

		{{ $post->content }}

		<footer>
			
		</footer>
	</article>
@endsection