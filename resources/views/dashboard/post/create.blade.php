@extends('layout')

@section('content')
    <form action="{{ route('post.store') }}" method="post">
        <label for="title">Title</label>
        <input type="text" name="title">
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>

        <select name="categoryId" id="category">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        {{ csrf_field() }}
        <button type="submit">Submit</button>
    </form>
@endsection
