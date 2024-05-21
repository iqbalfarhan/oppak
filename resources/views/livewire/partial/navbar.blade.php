<div class="navbar print:hidden">
    <div class="navbar-start">
        <label for="drawer" class="btn btn-circle btn-ghost">
            <x-tabler-menu class="size-5" />
        </label>
    </div>
    <div class="navbar-center">
        @livewire('partial.logo', ['class' => 'h-6'])
        {{-- <a href="{{ route('home') }}" wire:navigate class="text-xl font-bold">
            {{ config('app.name') }}
        </a> --}}
    </div>
    <div class="navbar-end">
        <a href="{{ route('profile') }}" class="btn btn-circle avatar btn-bordered" wire:navigate>
            <div class="w-10 rounded-full">
                <img alt="{{ $user->name }}" src="{{ $user->image }}" />
            </div>
        </a>
    </div>
</div>
