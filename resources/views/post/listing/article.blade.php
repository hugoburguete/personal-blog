<article class="card card-listing-item">
	<div class="card-inner">
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
                <p class="date"><small>{{ $post->created_at->format('jS M Y') }}</small></p>
                <h4><a href="{{ route('post.show', ['post' => $post->slug]) }}">{{ $post->title }}</a></h4>
			</div>
			<div class="card-body">
				{!! $post->short_description !!}
            </div>
            <p><a href="{{ route('post.show', ['post' => $post->slug]) }}">Read more</a></p>
		</div>
	</div>
</article>