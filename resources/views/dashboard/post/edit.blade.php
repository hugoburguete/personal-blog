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

            <div class="category-container">
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="categoryId" id="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('categoryId', $post->categories->first()->id) ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put" />
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
