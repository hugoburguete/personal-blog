<article class="card card-listing-item">
	<h1>{{ $post->title }}</h1>
	<small><a href="{{ route('post.edit', ['id' => $post->id]) }}">Edit</a> | <a href="{{ route('post.destroy', ['id' => $post->id]) }}">Delete</a></small>
</article>