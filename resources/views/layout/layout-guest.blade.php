@extends('layout.layout')

@section('title')
@yield('title')
@endsection

@section('body')
<div class="lg:flex min-h-screen ">
    <div class="lg:w-7/12 min-h-screen bg-white dark:bg-gray-900 bg-[center_top_4rem] bg-cover"
        style="background-image: url('{{asset('images/logo.png')}}')">
        <x_app-name />

        <h2 class="py-12 text-center text-5xl font-bold ">
            Mira los momentos cotidianosde tus
            <span class="bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                mejores amigos.
            </span>
        </h2>

        {{-- <img class="" src="{{asset('images/logo.png')}}" alt="logo"> --}}
        {{-- <button id="theme-toggle"
            class="p-2 rounded-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 transition-colors">
            <!-- Icono Luna -->
            <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 hidden dark:block">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75
            0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635
            7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
            </svg>

            <!-- Icono Sol -->
            <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 block dark:hidden">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386
            6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591
            1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75
            12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
            </svg>
        </button> --}}
    </div>

    <div
        class="lg:w-5/12 min-h-screen px-5 bg-gray-50 dark:bg-gray-800 border-l-2 border-gray-300 dark:border-gray-700">
        <x-header2>
            @yield('header')
        </x-header2>
        @yield('content')
    </div>
</div>

@endsection