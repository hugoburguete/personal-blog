<div id="page-footer">
	<section>
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
