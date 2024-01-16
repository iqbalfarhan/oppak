<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? config('app.name') }}</title>

        @vite('resources/css/app.css')
    </head>

    <body>
        @auth
            <div class="drawer lg:drawer-open">
                <input id="drawer" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content">
                    @livewire('partial.navbar')

                    <div class="mx-auto p-6">
                        {{ $slot }}
                    </div>
                </div>
                <div class="drawer-side">
                    <label for="drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                    @livewire('partial.sidebar')
                </div>
            </div>
        @endauth

        @guest
            <div class="w-full min-h-screen bg-base-200 grid place-content-center p-4">
                operasional site PAK
                <div class="card w-96 bg-base-100">
                    <div class="card-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt quod voluptatibus porro quibusdam,
                        explicabo deleniti quia architecto, corrupti, repellendus alias soluta nobis inventore quam vel.
                        Assumenda beatae soluta autem nesciunt.
                    </div>
                </div>
            </div>
        @endguest
    </body>

</html>
