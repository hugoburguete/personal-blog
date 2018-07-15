@extends('layout')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>
    <div class="row justify-content-center">
        @if ($posts->isEmpty())
            @include('post.empty')
        @else
            @foreach ($posts as $post)
                @include('post.listing.article', ['post' => $post])
            @endforeach
        @endif
    </div>
</div>
@endsection
