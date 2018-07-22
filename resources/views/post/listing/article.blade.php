<article class="card card-listing-item">
	<div class="card-content">
		<div class="card-header">
			<h2><a href="/post/{{ $post->slug }}">{{ $post->title }}</a></h2>
			<p class="categories">
				@foreach ($post->categories as $category)
					<a href="{{ route('category.show', ['category' => $category->slug]) }}">
						{{ $category->name }}
					</a>,
				@endforeach
			</p>
		</div>
		<div class="card-body">
			<p>{!! $post->short_description !!}</p>
		</div>
	</div>
</article>