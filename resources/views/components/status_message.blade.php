@if (session()->has('status'))
	<p>{{ session('status') }}</p>
@endif