<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('site.head')
    </head>
    <body class="{{ $pageSlug ?? '' }}">
        <div id="app">
            @include('site.header')
            <div id="app-content">
                @include('components.status_message')
                @yield('content')
            </div>
            @include('site.footer')
        </div>
        @include('site.scripts')
    </body>
</html>