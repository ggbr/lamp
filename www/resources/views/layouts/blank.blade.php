<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="msapplication-tap-highlight" content="no">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<title>{{ $title ?? "Título não definido" }} | {{ config('app.name') }}</title>
		{{-- Favicons--}}
		<link rel="icon" href="{{ asset('images/favicon/favicon-32x32.png') }}" sizes="32x32">
		<link rel="apple-touch-icon-precomposed" href="{{ asset('images/favicon/apple-touch-icon-152x152.png') }}">
		{{-- For iPhone --}}
		<meta name="msapplication-TileColor" content="#00bcd4">
		<meta name="msapplication-TileImage" content="{{ asset('images/favicon/mstile-144x144.png') }}">
        {{-- CSS Padrão do Template --}}
        @include('layouts.blank.defaultCSS')

        {{-- CSS Específico da Página --}}
        @yield('PageStyleSheets')
    </head>
	<body class="">
        {{-- Incluindo Loader --}}
        @include('global.loader')

        {{-- CONTEUDO DA PÁGINA --}}
        @yield('PageContent')

    	{{-- Incluindo JavaScripts --}}
        @include('layouts.blank.defaultJavaScript')
        @yield('PageScripts')
	</body>
</html>
