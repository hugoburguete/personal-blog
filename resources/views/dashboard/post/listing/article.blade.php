<tr>
	<td><a href="{{ route('post.edit', ['id' => $post->id]) }}">{{ $post->title }}</a></td>
	<td>
		@foreach ($post->categories as $category)
			<a href="{{ route('category.edit', ['id' => $category->id]) }}">{{ $category->name }}</a>
		@endforeach
	</td>
	<td>{{ implode(',', $post->keywords) }}</td>
	<td>
		<small>
			<a href="{{ route('post.edit', ['id' => $post->id]) }}">Edit</a> | 
			<a href="{{ route('post.destroy', ['id' => $post->id]) }}">Delete</a>
		</small>
	</td>
</tr>