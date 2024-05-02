<div class="navbar">
    <div class="navbar-start">
        <label for="drawer" class="btn btn-circle btn-ghost">
            <x-tabler-menu class="size-5" />
        </label>
    </div>
    <div class="navbar-center">
        <a href="{{ route('home') }}" class="btn btn-ghost text-xl" wire:navigate>{{ config('app.name') }}</a>
    </div>
    <div class="navbar-end">
        <a href="{{ route('profile') }}" class="btn btn-circle avatar btn-bordered" wire:navigate>
            <div class="w-10 rounded-full">
                <img alt="{{ $user->name }}" src="{{ $user->image }}" />
            </div>
        </a>
    </div>
</div>
