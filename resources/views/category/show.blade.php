@extends('layout')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>
    <div class="justify-content-center">
        @forelse ($posts as $post)
            @include('post.listing.article', ['post' => $post])
        @empty
            @include('post.empty')
        @endforelse
    </div>
    <?php echo $posts->links(); ?>
</div>
@endsection
