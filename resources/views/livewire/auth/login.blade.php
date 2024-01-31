<div class="card w-96 bg-base-100 shadow overflow-hidden">
    <form class="card-body space-y-6" wire:submit="login">
        <div class="divider font-semibold text-lg">Login ke {{ config('app.name') }}</div>
        <div class="space-y-4">
            <input type="text" class="input input-bordered w-full @error('username') input-error @enderror"
                placeholder="Username" wire:model="username">
            <input type="password" class="input input-bordered w-full @error('username') input-error @enderror"
                placeholder="Password" wire:model="password">
        </div>
        <div class="card-action flex justify-end">
            <button class="btn btn-primary">
                <span>Sign in</span>
                <x-tabler-login class="icon-5" />
            </button>
        </div>

    </form>
    <div class="card-body bg-base-200 py-4">
        <div class="text-center text-xs opacity-50">Login menggunakan LDAP atau user yang sudah terdaftar</div>
    </div>
</div>
