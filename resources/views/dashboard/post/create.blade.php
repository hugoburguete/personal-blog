@extends('layout')

@section('content')
    <form action="{{ route('post.store') }}" method="post">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        
        <div class="form-group">
            <select name="categoryId" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <p>or create a new category</p>

            <label for="title">Name</label>
            <input type="text" name="category_name">
        </div>

        {{ csrf_field() }}
        <button type="submit">Submit</button>
    </form>
@endsection
