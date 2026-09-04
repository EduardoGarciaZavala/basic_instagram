@extends('layout.layout-auth')

@section('title')
    {{ $user->username }}
@endsection

@section('header')
    <div class="flex items-center gap-2 px-1 py-4 text-gray-900 dark:text-white">
        <h1 class="text-xl font-semibold sm:text-2xl">{{ '@' . $user->username }}</h1>
        <svg class="h-5 w-5 text-blue-500" aria-label="Perfil" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.172 7.707 8.879a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd" />
        </svg>
    </div>
@endsection

@section('content')
    @php($posts = $posts ?? [])

    <section class="mx-auto overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800"
        aria-labelledby="profile-name">
        <div class="px-4 py-6 sm:px-8 sm:py-8">
            <div class="grid grid-cols-[88px_1fr] items-center gap-5 sm:grid-cols-[160px_1fr] sm:gap-10 lg:gap-16">
                <div
                    class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-gradient-to-tr from-amber-400 via-pink-500 to-purple-600 p-[3px] sm:h-36 sm:w-36">
                    <div
                        class="flex h-full w-full items-center justify-center rounded-full border-4 border-white bg-gray-100 text-2xl font-bold uppercase text-gray-600 dark:border-gray-800 dark:bg-gray-700 dark:text-gray-200 sm:text-5xl">
                        {{ mb_substr($user->username, 0, 1) }}
                    </div>
                </div>

                <div class="min-w-0">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                        <div class="min-w-0">
                            <h2 id="profile-name" class="truncate text-xl font-semibold text-gray-900 dark:text-white">
                                {{ $user->username }}
                            </h2>
                            <p class="truncate text-sm text-gray-500 dark:text-gray-400">{{ $user->name }}</p>
                        </div>

                        @auth
                            @if (auth()->id() === $user->id)
                                <a href="{{ route('profile.edit') }}"
                                    class="inline-flex w-fit items-center justify-center rounded-lg bg-gray-100 px-4 py-2 text-sm font-semibold text-gray-900 transition hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    Editar perfil
                                </a>
                            @else
                                <button type="button"
                                    class="inline-flex w-fit items-center justify-center rounded-lg bg-blue-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
                                    Seguir
                                </button>
                            @endif
                        @endauth
                    </div>

                    <dl class="mt-5 hidden gap-8 text-sm text-gray-700 dark:text-gray-300 sm:flex">
                        <div class="flex gap-1.5">
                            <dt class="font-normal">publicaciones</dt>
                            <dd class="order-first font-semibold text-gray-900 dark:text-white">{{ count($posts) }}</dd>
                        </div>
                        <div class="flex gap-1.5">
                            <dt class="font-normal">seguidores</dt>
                            <dd class="order-first font-semibold text-gray-900 dark:text-white">0</dd>
                        </div>
                        <div class="flex gap-1.5">
                            <dt class="font-normal">seguidos</dt>
                            <dd class="order-first font-semibold text-gray-900 dark:text-white">0</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="mt-6 sm:ml-[200px] lg:ml-[224px]">
                <p class="font-semibold text-gray-900 dark:text-white">{{ $user->name }}</p>
                <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-300">
                    {{ $user->description ?: 'Comparte tus mejores momentos con la comunidad.' }}
                </p>
            </div>
        </div>

        <dl class="grid grid-cols-3 border-t border-gray-200 py-3 text-center text-xs text-gray-500 dark:border-gray-700 dark:text-gray-400 sm:hidden">
            <div>
                <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{ count($posts) }}</dd>
                <dt>publicaciones</dt>
            </div>
            <div>
                <dd class="text-sm font-semibold text-gray-900 dark:text-white">0</dd>
                <dt>seguidores</dt>
            </div>
            <div>
                <dd class="text-sm font-semibold text-gray-900 dark:text-white">0</dd>
                <dt>seguidos</dt>
            </div>
        </dl>

        <div class="border-t border-gray-200 dark:border-gray-700">
            <div class="flex justify-center">
                <div
                    class="flex items-center gap-2 border-t-2 border-gray-900 px-4 py-3 text-xs font-semibold uppercase tracking-widest text-gray-900 dark:border-white dark:text-white">
                    <svg class="h-4 w-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4h6v6H4V4zm10 0h6v6h-6V4zM4 14h6v6H4v-6zm10 0h6v6h-6v-6z" />
                    </svg>
                    Publicaciones
                </div>
            </div>

            <div class="grid grid-cols-3 gap-0.5 bg-gray-200 dark:bg-gray-700 sm:gap-1"
                aria-label="Publicaciones de {{ $user->username }}">
                @forelse ($posts as $post)
                    <a href="#"
                        class="group relative aspect-square overflow-hidden bg-gray-100 focus:outline-none focus:ring-4 focus:ring-inset focus:ring-blue-500 dark:bg-gray-900">
                        <img src="{{ asset('storage/' . $post->image) }}"
                            alt="Publicación de {{ $user->username }}"
                            class="h-full w-full object-cover transition duration-300 group-hover:scale-105" loading="lazy">

                        <div
                            class="absolute inset-0 hidden items-center justify-center gap-5 bg-black/45 text-sm font-semibold text-white group-hover:flex group-focus:flex sm:text-base">
                            <span class="flex items-center gap-1.5">
                                <svg class="h-5 w-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $post->likes_count ?? 0 }}
                            </span>
                            <span class="flex items-center gap-1.5">
                                <svg class="h-5 w-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10c0 3.866-3.582 7-8 7a8.84 8.84 0 01-3.908-.875L2 17l1.102-3.306A6.4 6.4 0 012 10c0-3.866 3.582-7 8-7s8 3.134 8 7z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $post->comments_count ?? 0 }}
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="col-span-3 flex min-h-72 flex-col items-center justify-center bg-white px-6 py-12 text-center dark:bg-gray-800">
                        <div
                            class="flex h-16 w-16 items-center justify-center rounded-full border-2 border-gray-900 text-gray-900 dark:border-white dark:text-white">
                            <svg class="h-8 w-8" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 16l4-4a2 2 0 012.828 0L13 15.172l2-2a2 2 0 012.828 0L21 16.344M8 8h.01M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-xl font-bold text-gray-900 dark:text-white">Aún no hay publicaciones</h3>
                        <p class="mt-2 max-w-sm text-sm text-gray-500 dark:text-gray-400">
                            Cuando {{ $user->username }} comparta fotos, aparecerán aquí en una cuadrícula.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
