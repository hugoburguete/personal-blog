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
			<a href="{{ route('logout') }}" 
				onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				Logout
			</a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
		@endif
	</section>
</div>
