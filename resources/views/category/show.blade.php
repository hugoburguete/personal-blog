@extends('layout')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>
    <div class="row justify-content-center">
        @forelse ($posts as $post)
            @include('post.listing.article', ['post' => $post])
        @empty
            @include('post.empty')
        @endforelse
        <?php echo $posts->links(); ?>
    </div>
</div>
@endsection
