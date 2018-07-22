<div id="page-footer">
	@if (!empty(config('contact.email')))
		<p>Contact: <a href="{{ config('contact.email') }}">{{ config('contact.email') }}</a></p>
	@endif

	<section>
		@if (Auth::guest())
			<a href="{{ route('login') }}">Login</a>
		@endif

		@if (!Auth::guest())
			<a href="{{ route('admin.index') }}">Dashboard</a>
			<a href="{{ route('admin.posts') }}">Edit all posts</a>
			<a href="{{ route('logout') }}">Logout</a>
		@endif
	</section>
</div>
