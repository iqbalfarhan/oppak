<div class="card card-compact bg-base-100 border-2 border-base-300 overflow-hidden">
    <div class="card-body text-center space-y-4">
        <div class="avatar self-center">
            <div class="w-20 rounded-full">
                <img src="{{ $user->image }}" alt="">
            </div>
        </div>
        <div>
            <h3 class="font-semibold">{{ $user->name }}</h3>
            <span class="text-xs opacity-50">{{ $user->lokasi ? $user->lokasi->name : $user->username }}</span>
        </div>
    </div>
    <div class="card-body bg-base-200">
        <div class="card-actions justify-between">
            <a href="{{ route('profile') }}" class="text-xs opacity-75 btn btn-xs btn-ghost">
                <span>Edit profile</span>
            </a>
            <button wire:click="$dispatch('logout')" class="text-xs opacity-75 btn btn-xs btn-ghost">
                <span>Logout</span>
            </button>
        </div>
    </div>
</div>
