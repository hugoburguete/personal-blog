@extends('layout')

@section('head_scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
@endsection

@section('footer_scripts')
    <script type="application/javascript">
        ClassicEditor
            .create(document.querySelector('#short_description'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

@section('content')
    <div class="container">
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

            <div class="category-container">
                <div class="form-group">
                    <label for="category">Add existing category</label>
                    <select name="categoryId" id="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    @include(
                            'components.forms.text_input', 
                            [
                                'label' => 'or create a new category',
                                'name' => 'category_name',
                                'value' => '',
                            ]
                    )
                </div>
            </div>

            {{ csrf_field() }}
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
