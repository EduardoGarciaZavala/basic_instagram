@extends('layout.layout-guest')

@section('title')
Crea Una Cuenta
@endsection

@section('header')
Empieza a usar
<x-span-app-name />
<p class="text-black dark:text-gray-50">Regístrate para ver fotos y videos de tus amigos.</p>
@endsection

@section('content')
<form action="{{route('register.store')}}" method="POST">
    @csrf
    <div class="mt-4">
        <x-label for="email">email</x-label>
        <x-input id="email" name="email" type="text" placeholder="email@email.com" value="{{old('email')}}" />
        <p class="text-black dark:text-gray-50">Es posible que te enviemos notificaciones. <a
                class="text-blue-600 dark:text-blue-500 underline" href="{{route('register.help')}}"
                target="_blanck">Porque solicitamos tu informacion de contacto</a> </p>
        <div class="min-h-2 max-h-2">
            @error('email')
            <p class="text-red-600 font-bold p-0 m-0">{{$message}}</p>
            @enderror
        </div>

    </div>
    <div class="mt-4">
        <x-label for="password">password</x-label>
        <x-input id="password" name="password" type="password" placeholder="********" value="{{old('password')}}" />
        <div class="min-h-2 max-h-2">
            @error('password')
            <p class="text-red-600 font-bold p-0 m-0">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="mt-4">
        <x-label for="password_confirmation">Repite tu password</x-label>
        <x-input id="password_confirmation" name="password_confirmation" type="password" placeholder="********"
            value="{{old('password_confirmation')}}" />
        <div class="min-h-2 max-h-2">
            @error('password_confirmation')
            <p class="text-red-600 font-bold p-0 m-0">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="mt-4">
        <x-label for="birthdate">Fecha de nacimiento</x-label>
        <x-input id="birthdate" name="birthdate" type="date" value={{now()}} value="{{old('birthdate')}}" />
        <div class="min-h-2 max-h-2">
            @error('birthdate')
            <p class="text-red-600 font-bold p-0 m-0">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="mt-4">
        <x-label for="name">Nombre</x-label>
        <x-input id="name" name="name" type="text" placeholder="Nombre completo" value="{{old('name')}}" />
        <div class="min-h-2 max-h-2">
            @error('name')
            <p class="text-red-600 font-bold p-0 m-0">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="mt-4">
        <x-label for="username">Nombre de usuario</x-label>
        <x-input id="username" name="username" type="text" placeholder="Nombre usuario" value="{{old('username')}}" />
        <div class="min-h-2 max-h-2">
            @error('username')
            <p class="text-red-600 font-bold p-0 m-0">{{$message}}</p>
            @enderror
        </div>
    </div>

    <div class=" mt-4 flex justify-end gap-3 items-center">
        <nav class="flex justify-between gap-6">
            <a class="text-gray-600 dark:text-gray-50 underline text-xs font-bold" href="{{route('home')}}">ya tienes
                una cuenta? inicia sesion</a>
            <a class="text-gray-600 dark:text-gray-50 underline text-xs font-bold" href="*">Olvidaste tu contraseña?</a>
        </nav>
        <x-primary-button type="submit" value="Enviar" />
    </div>
</form>
@endsection