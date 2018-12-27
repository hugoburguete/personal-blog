{{-- Meta --}}
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
{!! SEO::generate(config('app.env') === 'live') !!}
<meta name="google-site-verification" content="{{ config('services.google.webmastertools') }}" />
<meta name="msvalidate.01" content="{{ config('services.bing.webmastertools') }}" />
@yield('site_meta')

{{-- App stylesheets --}}
<link rel="stylesheet" href="{{ url('/css/app.css') }}">
@yield('head_styles')

{{-- App JS --}}
@yield('head_scripts')
