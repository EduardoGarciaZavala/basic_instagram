<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('')}}">
    <title>basic instagram - @yield('title')</title>

</head>

<body class="min-h-screen text-gray-800 dark:text-gray-50 ">
    @yield('body')
</body>

<footer class="py-16 bg-gray-200 dark:bg-gray-800 text-center  border border-gray-300 dark:border-gray-700">
    <x-span-app-name />
    <span class="">- todos los derechos reservados {{now()->year}}</span>
</footer>

</html>