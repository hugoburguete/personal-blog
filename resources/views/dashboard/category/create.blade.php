@extends('layout')

@section('content')
    <form action="{{ route('category.store') }}" method="POST">
        @include(
                'components.forms.text_input', 
                [
                    'label' => 'Name',
                    'name' => 'name',
                    'value' => '',
                ]
        )

        {{ csrf_field() }}
        <button type="submit">Submit</button>
    </form>
@endsection
