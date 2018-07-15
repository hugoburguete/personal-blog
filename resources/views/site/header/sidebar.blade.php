<div id="sidebar-me" class="sidebar">
	<img class="avatar" src="/img/floppy-disk.svg" alt="Me" />
	<h1>FloppyDev</h1>
	<p>We do dev stuff. <a href="/">Check it out</a></p>
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