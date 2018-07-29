<article class="card card-listing-item {{ $columnClass ?? 'col-6' }}">
	<div class="card-inner">
		<div class="thumbnail-container">
			@if (!empty($post->thumbnail_url))
				<img src="{{ asset('storage/thumbnails/thumbnail-20.png') }}" alt="{{ $post->title }}">
			@else
				<img src="https://placehold.it/200x200" alt="{{ $post->title }}">
			@endif
		</div>
		<div class="card-content">
			<div class="card-header">
				<h2><a href="{{ route('post.show', ['post' => $post->slug]) }}">{{ $post->title }}</a></h2>
				<p class="categories">
					@foreach ($post->categories as $category)
						<a href="{{ route('category.show', ['category' => $category->slug]) }}">
							{{ $category->name }}
						</a>,
					@endforeach
				</p>
			</div>
			<div class="card-body">
				{!! $post->short_description !!}
			</div>
		</div>
	</div>
</article>