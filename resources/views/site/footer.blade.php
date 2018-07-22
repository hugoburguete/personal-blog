<div id="page-footer">
	<section>
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
	</section>
	<section>
		@if (config('app.env') != 'production')
			<div class="section-heading">Other links</div>
			@if (Auth::guest())
				<a href="{{ route('login') }}">Login</a>
			@endif
			@if (!Auth::guest())
				<a href="{{ route('admin.index') }}">Dashboard</a>
				<a href="{{ route('admin.posts') }}">Edit all posts</a>
				<a href="{{ route('logout') }}">Logout</a>
			@endif
		@endif
	</section>
</div>
