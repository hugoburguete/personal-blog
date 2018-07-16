<div id="sidebar-me" class="sidebar">
	<a href="/">
		<img class="avatar" src="/img/floppy-disk.svg" alt="{{ config('app.name') }}" />
	</a>
	<h1>{{ config('app.name') }}</h1>
	<p>We do dev stuff. <a href="/">Check it out</a></p>
	<article>
		<div class="section-heading">Recent articles</div>
		
		@foreach ($recentArticles as $article)
			<article>
				<p>
					<a href="{{ route('post.show', ['id' => $article->slug]) }}">
						{{ $article->title }}
					</a>
				</p>
			</article>
		@endforeach
	</article>

	<div>
		@if (config('app.env') != 'production')
			<div class="section-heading">Other links</div>
			<a href="{{ route('login') }}">Login</a>
			@if (!Auth::guest())
				<a href="{{ route('admin.index') }}">Dashboard</a>
			@endif
		@endif
	</div>
</div>