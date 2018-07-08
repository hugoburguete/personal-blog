<div id="sidebar-me" class="sidebar">
	<img class="avatar" src="https://placehold.it/200x200" alt="Me" />
	<h1>Hugo Burguete</h1>
	<p>Hey. Welcome to my channel</p>
	<article>
		<div class="section-heading">Recent articles</div>
		
		@foreach ($recentArticles as $article)
			<article>
				<p>
					<a href="/post/{{ $article->slug }}">
						{{ $article->title }}
					</a>
				</p>
			</article>
		@endforeach
	</article>

	<div>
		<div class="section-heading">Other links</div>
		@if (!Auth::guest())
			<a href="{{ route('admin.index') }}">Dashboard</a>
		@endif
	</div>
</div>