@extends('layout.layout-auth')

@section('title')
Profile
@endsection

@section('content')

@section('header')
<p class="font-bold text-2xl p-4">Profile</p>
@endsection

<form action="{{route('profile.update')}}" method="POST">
    <div class="grid gap-4 mb-4 sm:grid-cols-2">
        @csrf
        <div >
            <x-label for="email">email</x-label>
            <x-input id="email" name="email" type="text" placeholder="email@email.com" value="{{old('email')}}" />
            <div class="min-h-2 max-h-2">
                @error('email')
                <p class="text-red-600 font-bold p-0 m-0">{{$message}}</p>
                @enderror
            </div>

        </div>
        <div >
            <x-label for="password">password</x-label>
            <x-input id="password" name="password" type="password" placeholder="********" value="{{old('password')}}" />
            <div class="min-h-2 max-h-2">
                @error('password')
                <p class="text-red-600 font-bold p-0 m-0">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div >
            <x-label for="password_confirmation">Repite tu password</x-label>
            <x-input id="password_confirmation" name="password_confirmation" type="password" placeholder="********"
                value="{{old('password_confirmation')}}" />
            <div class="min-h-2 max-h-2">
                @error('password_confirmation')
                <p class="text-red-600 font-bold p-0 m-0">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div >
            <x-label for="birthdate">Fecha de nacimiento</x-label>
            <x-input id="birthdate" name="birthdate" type="date" value={{now()}} value="{{old('birthdate')}}" />
            <div class="min-h-2 max-h-2">
                @error('birthdate')
                <p class="text-red-600 font-bold p-0 m-0">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div >
            <x-label for="name">Nombre</x-label>
            <x-input id="name" name="name" type="text" placeholder="Nombre completo" value="{{old('name')}}" />
            <div class="min-h-2 max-h-2">
                @error('name')
                <p class="text-red-600 font-bold p-0 m-0">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div >
            <x-label for="username">Nombre de usuario</x-label>
            <x-input id="username" name="username" type="text" placeholder="Nombre usuario"
                value="{{old('username')}}" />
            <div class="min-h-2 max-h-2">
                @error('username')
                <p class="text-red-600 font-bold p-0 m-0">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="sm:col-span-2">
            <label for="description"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="description" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Write product description here"></textarea>
        </div>
    </div>
    <x-primary-button type="submit" value="Guardar" />
</form>
@endsection