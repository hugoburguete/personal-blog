@extends('layout')

@section('content')
    <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST">
        @include(
                'components.forms.text_input', 
                [
                    'label' => 'Title',
                    'name' => 'title',
                    'value' => old('title', $post->title),
                ]
        )
        @include(
                'components.forms.textarea', 
                [
                    'label' => 'Short Description (make it short)',
                    'name' => 'short_description',
                    'value' => old('short_description', $post->short_description),
                ]
        )
        @include(
                'components.forms.text_input', 
                [
                    'label' => 'Key words (comma separated)',
                    'name' => 'keywords',
                    'value' => implode(',', old('keywords', $post->keywords)),
                ]
        )
        @include(
                'components.forms.textarea', 
                [
                    'label' => 'Content',
                    'name' => 'content',
                    'value' => old('content', $post->content),
                ]
        )

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
