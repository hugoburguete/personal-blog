@extends('layout')

@section('content')
	<div class="container">
	    <a href="{{ route('post.create') }}">Create new post</a>
	    <a href="{{ route('category.create') }}">Create new category</a>
	    <table>
	    	<thead>
	    		<tr>
	    			<th>Title</th>
	    			<th>Categories</th>
	    			<th>Keywords</th>
	    			<th>Actions</th>
	    		</tr>
	    	</thead>
	    	<tbody>
				@foreach ($posts as $post)
					@include('dashboard.post.listing.article', ['post' => $post])
				@endforeach
	    	</tbody>
	    </table>
		{{ $posts->links() }}
	</div>
@endsection