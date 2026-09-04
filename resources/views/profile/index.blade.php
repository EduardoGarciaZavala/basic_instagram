@extends('layout.layout-auth')

@section('title')
    Editar perfil
@endsection

@section('header')
    <div class="px-1 py-4 text-gray-900 dark:text-white">
        <h1 class="text-xl font-semibold sm:text-2xl">Editar perfil</h1>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Actualiza tu información personal y la seguridad de tu cuenta.
        </p>
    </div>
@endsection

@section('content')
    <section
        class="mx-auto overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800"
        aria-labelledby="profile-form-title">
        <div class="border-b border-gray-200 px-5 py-6 dark:border-gray-700 sm:px-8">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center gap-4">
                    <div
                        class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-gradient-to-tr from-amber-400 via-pink-500 to-purple-600 p-[3px] sm:h-20 sm:w-20">
                        <div
                            class="flex h-full w-full items-center justify-center rounded-full border-4 border-white bg-gray-100 text-2xl font-bold uppercase text-gray-600 dark:border-gray-800 dark:bg-gray-700 dark:text-gray-200">
                            {{ mb_substr($user->username, 0, 1) }}
                        </div>
                    </div>

                    <div class="min-w-0">
                        <h2 id="profile-form-title" class="truncate text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $user->name }}
                        </h2>
                        <p class="truncate text-sm text-gray-500 dark:text-gray-400">{{ '@' . $user->username }}</p>
                    </div>
                </div>

                <a href="{{ route('post', ['user' => $user->username]) }}"
                    class="inline-flex w-fit items-center justify-center gap-2 rounded-lg bg-gray-100 px-4 py-2 text-sm font-semibold text-gray-900 transition hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    <svg class="h-4 w-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0c0 1.657-4.03 6-9 6s-9-4.343-9-6 4.03-6 9-6 9 4.343 9 6z" />
                    </svg>
                    Ver perfil
                </a>
            </div>
        </div>

        @if (session('status'))
            <div class="mx-5 mt-6 flex items-center gap-3 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-800 dark:border-green-800 dark:bg-green-900/30 dark:text-green-300 sm:mx-8"
                role="status">
                <svg class="h-5 w-5 shrink-0" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.172 7.707 8.879a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-8 px-5 py-6 sm:px-8 sm:py-8">
                <fieldset>
                    <legend class="flex items-center gap-2 text-base font-semibold text-gray-900 dark:text-white">
                        <svg class="h-5 w-5 text-blue-600 dark:text-blue-400" aria-hidden="true" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A9.953 9.953 0 0112 15c2.615 0 5 1 6.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0zm6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Información personal
                    </legend>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Estos datos identifican tu cuenta dentro de la aplicación.
                    </p>

                    <div class="mt-5 grid gap-x-5 gap-y-4 sm:grid-cols-2">
                        <div>
                            <x-label for="name">Nombre completo</x-label>
                            <x-input id="name" name="name" type="text" autocomplete="name"
                                placeholder="Nombre completo" value="{{ old('name', $user->name) }}" />
                            @error('name')
                                <p class="mt-1.5 text-sm font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-label for="username">Nombre de usuario</x-label>
                            <div class="relative">
                                <span
                                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-sm text-gray-500 dark:text-gray-400">@</span>
                                <x-input id="username" name="username" type="text" autocomplete="username"
                                    class="pl-8" placeholder="usuario"
                                    value="{{ old('username', $user->username) }}" />
                            </div>
                            @error('username')
                                <p class="mt-1.5 text-sm font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-label for="email">Correo electrónico</x-label>
                            <x-input id="email" name="email" type="email" autocomplete="email"
                                placeholder="correo@ejemplo.com" value="{{ old('email', $user->email) }}" />
                            @error('email')
                                <p class="mt-1.5 text-sm font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-label for="birthdate">Fecha de nacimiento</x-label>
                            <x-input id="birthdate" name="birthdate" type="date"
                                value="{{ old('birthdate', $user->birthdate?->format('Y-m-d')) }}" />
                            @error('birthdate')
                                <p class="mt-1.5 text-sm font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <x-label for="description">Biografía</x-label>
                            <textarea id="description" name="description" rows="4"
                                class="block w-full resize-y rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                placeholder="Cuéntanos algo sobre ti...">{{ old('description', $user->description) }}</textarea>
                            <div class="mt-1.5 flex items-start justify-between gap-4">
                                @error('description')
                                    <p class="text-sm font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                                @else
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Esta información aparecerá en tu perfil.</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div class="border-t border-gray-200 dark:border-gray-700"></div>

                <fieldset>
                    <legend class="flex items-center gap-2 text-base font-semibold text-gray-900 dark:text-white">
                        <svg class="h-5 w-5 text-blue-600 dark:text-blue-400" aria-hidden="true" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 11c0-1.105.895-2 2-2s2 .895 2 2v2m-8 7h8a2 2 0 002-2v-5a2 2 0 00-2-2H8a2 2 0 00-2 2v5a2 2 0 002 2zm2-9V7a4 4 0 118 0v4" />
                        </svg>
                        Seguridad
                    </legend>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Déjalo en blanco si no deseas cambiar tu contraseña.
                    </p>

                    <div class="mt-5 grid gap-x-5 gap-y-4 sm:grid-cols-2">
                        <div>
                            <x-label for="password">Nueva contraseña</x-label>
                            <x-input id="password" name="password" type="password" autocomplete="new-password"
                                placeholder="Mínimo 8 caracteres" />
                            @error('password')
                                <p class="mt-1.5 text-sm font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-label for="password_confirmation">Confirmar contraseña</x-label>
                            <x-input id="password_confirmation" name="password_confirmation" type="password"
                                autocomplete="new-password" placeholder="Repite tu contraseña" />
                            @error('password_confirmation')
                                <p class="mt-1.5 text-sm font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </fieldset>
            </div>

            <div
                class="flex flex-col-reverse gap-3 border-t border-gray-200 bg-gray-50 px-5 py-4 dark:border-gray-700 dark:bg-gray-800/70 sm:flex-row sm:items-center sm:justify-end sm:px-8">
                <a href="{{ route('post', ['user' => $user->username]) }}"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    Cancelar
                </a>
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
                    <svg class="h-4 w-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7" />
                    </svg>
                    Guardar cambios
                </button>
            </div>
        </form>
    </section>
@endsection
