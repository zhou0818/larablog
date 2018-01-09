<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Mr.Zhou Blog') - {{ setting('site_name', 'Mr.Zhou Blog') }}</title>
    <meta name="description" content="@yield('description', setting('seo_description', 'Mr.Zhou的博客。'))"/>
    <meta name="keyword"
          content="@yield('keyword', setting('seo_keyword', 'Laravel,Python,Vue,React,Mr.zhou,对头科技,昆明网站建设,昆明微信开发,昆明微信小程序开发,昆明微信公众号开发,网站建设,微信开发,微信小程序开发,微信公众号开发'))"/>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
<div id="app" class="{{ route_class() }}-page">

    @include('layouts._header')

    <div class="container">
        @include('layouts._message')
        @yield('content')

    </div>
    @yield('ribbon')
    @include('layouts._footer')
</div>

@if (app()->isLocal())
    @include('sudosu::user-selector')
@endif
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>