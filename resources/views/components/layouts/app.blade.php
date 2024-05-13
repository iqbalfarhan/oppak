<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $lang ?? app()->getLocale()) }}" data-theme="light">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>
        @vite('resources/css/app.css')
    </head>

    <body>
        @auth
            <div class="drawer lg:drawer-open min-h-screen bg-base-200">
                <input id="drawer" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content">
                    @livewire('partial.navbar')
                    {{ $slot }}
                    @livewire('partial.preview-image')
                </div>
                <div class="drawer-side scrollbar-hide">
                    <label for="drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                    @livewire('partial.sidebar')
                </div>
            </div>
        @endauth

        @guest
            <div class="flex flex-col gap-6 items-center justify-center h-screen bg-base-300 p-6">
                <div class="font-bold text-5xl mb-4 text-base-content">{{ config('app.name') }}</div>

                {{ $slot }}

                @if (Route::is('register'))
                    <p class="text-sm opacity-50 text-base-content">Sudah punya akun? <a href="{{ route('login') }}"
                            @class(['link'])>Masuk</a></p>
                @elseif (Route::is('login'))
                    @if (Route::has('register'))
                        <p class="text-sm opacity-50 text-base-content">Belum punya akun? <a href="{{ route('register') }}"
                                @class(['link'])>Daftar</a></p>
                    @endif
                @endif
            </div>
        @endguest

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />
    </body>

</html>
