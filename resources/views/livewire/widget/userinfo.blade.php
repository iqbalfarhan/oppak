<div class="card card-compact">
    <div class="card-body flex flex-row gap-4 items-center">
        <button class="btn btn-circle avatar btn-bordered"
            wire:click="$dispatch('showPreview', {url: '{{ $user->photo }}'})">
            <div class="w-12 rounded-full btn-bordered">
                <img src="{{ $user->image }}" alt="">
            </div>
        </button>
        <div class="flex flex-col flex-1">
            <div class="text-lg font-bold line-clamp-1">{{ $user->name }}</div>
            <div class="text-xs line-clamp-1">{{ $user->site ? $user->site->label : $user->getRoleNames()->first() }}
            </div>
        </div>
        <div class="hidden xl:flex">
            <a href="{{ route('profile') }}" class="btn btn-sm btn-bordered" wire:navigate>
                <x-tabler-edit class="size-4" />
                <span>Profile</span>
            </a>
        </div>
    </div>
</div>
