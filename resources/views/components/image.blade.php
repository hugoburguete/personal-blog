{{-- For now, we'll only use category images. Eventually, we'll want to grab the post image and fallback to a 
category image --}}

@php
	$categories = $post->categories;
	$filteredCategories = $categories->filter(function($value) {
		return in_array($value->slug, ['php']);
	});
@endphp

@if (!$filteredCategories->isEmpty())
	<img class="responsive-img" src="/img/php/php-{{ $size }}.jpg" alt="{{ $alt ?? '' }}">
@else
	<img class="responsive-img" src="https://placehold.it/{{ $size }}.jpg" alt="{{ $alt ?? '' }}">
@endif
