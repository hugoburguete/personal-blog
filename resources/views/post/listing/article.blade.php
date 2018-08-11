<article class="card card-listing-item {{ $columnClass ?? 'col-4' }}">
	<div class="card-inner">
		<div class="thumbnail-container">
			@include(
				'components.image', 
				[
					'post' => $post,
					'alt' => 'Featured image for ' . $post->title,
					'size' => '200x200',
				]
			)
		</div>
		<div class="card-content">
			<div class="card-header">
				<p class="categories">
					<small>
						<?php $i = 0; ?>
						@foreach ($post->categories as $category)
							<?php $i++ ?>
							<a href="{{ route('category.show', ['category' => $category->slug]) }}">
								{{ $category->name }}
							</a>
							@if ($i !== $post->categories->count())
								<span class="separator">, </span>
							@endif
						@endforeach
					</small>
				</p>
				<h4><a href="{{ route('post.show', ['post' => $post->slug]) }}">{{ $post->title }}</a></h4>
				<p class="date"><small>{{ $post->created_at->format('jS M Y') }}</small></p>
			</div>
			<div class="card-body">
				{!! $post->short_description !!}
			</div>
		</div>
	</div>
</article>