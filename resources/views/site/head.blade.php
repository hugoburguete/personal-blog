{{-- Meta --}}
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
{!! SEO::generate(config('app.env') === 'live') !!}
@yield('site_meta')

{{-- Fonts --}}
<link href="https://fonts.googleapis.com/css?family=Play|Open+Sans:300,300i,400,400i,600,600i" rel="stylesheet">

{{-- App stylesheets --}}
<link rel="stylesheet" href="{{ url('/css/app.css') }}">
@yield('head_styles')

{{-- App JS --}}
@yield('head_scripts')
