@extends('layout')

@section('content')
    <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST">
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}">
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>

        <select name="categoryId" id="category">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('categoryId', $post->categories->first()->id) ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>

        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put" />
        <button type="submit">Submit</button>
    </form>
@endsection
