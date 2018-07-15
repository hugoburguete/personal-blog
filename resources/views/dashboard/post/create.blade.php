@extends('layout')

@section('content')
    <form action="{{ route('post.store') }}" method="post">
        @include(
                'components.forms.text_input', 
                [
                    'label' => 'Title',
                    'name' => 'title',
                    'value' => '',
                ]
        )
        @include(
                'components.forms.textarea', 
                [
                    'label' => 'Short Description (make it short)',
                    'name' => 'short_description',
                    'value' => '',
                ]
        )
        @include(
                'components.forms.text_input', 
                [
                    'label' => 'Key words (comma separated)',
                    'name' => 'keywords',
                    'value' => '',
                ]
        )
        @include(
                'components.forms.textarea', 
                [
                    'label' => 'Content',
                    'name' => 'content',
                    'value' => '',
                ]
        )
        
        <div class="form-group">
            <select name="categoryId" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <p>or create a new category</p>

        @include(
                'components.forms.text_input', 
                [
                    'label' => 'Category',
                    'name' => 'category_name',
                    'value' => '',
                ]
        )
        </div>

        {{ csrf_field() }}
        <button type="submit">Submit</button>
    </form>
@endsection
