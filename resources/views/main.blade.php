@extends('layout.layout-guest')


@section('title')
Iniciar sesión
@endsection

@section('content')
@section('header')
Iniciar sesión en
<x-span-app-name />
@endsection

<form class="mt-16 w-full" method="POST" action="{{route('login.store')}}">
    @csrf
    <div class="mt-4">
        <x-label for="email">email</x-label>
        <x-input name="email" type="text" placeholder="email@email.com"></x-input>
    </div>
    <div class="mt-4">
        <x-label for="password">password</x-label>
        <x-input name="password" type="password" placeholder="********"></x-input>
    </div>

    <div class=" mt-4 flex justify-end gap-3 items-center">
        <nav class="flex justify-between gap-6">
            <a class="text-gray-600 dark:text-gray-50 underline text-xs font-bold"
                href="{{route('register.create')}}">Crear
                cuenta</a>
            <a class="text-gray-600 dark:text-gray-50 underline text-xs font-bold" href="*">Olvidaste tu contraseña?</a>
        </nav>
        <x-primary-button type="submit" value="log in" />
    </div>
    @if (session('message'))
    <div class="p-4 mb-4 text-sm text-red-800 bg-red-50 rounded-lg">
        {{ session('message') }}
    </div>
    @endif
</form>
@endsection