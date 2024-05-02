<div class="card max-w-sm border-0 shadow-xl">
    <form class="card-body" wire:submit="login">
        <div class="card-title">Login</div>
        <div class="py-4 space-y-1">
            <label @class([
                'input input-bordered flex items-center gap-2',
                'input-error' => $errors->first('username'),
            ])>
                <x-tabler-at class="size-5" />
                <input type="username" class="grow" placeholder="Username" wire:model="username"
                    autocomplete="username" />
            </label>
            <label @class([
                'input input-bordered flex items-center gap-2',
                'input-error' => $errors->first('password'),
            ])>
                <x-tabler-key class="size-5" />
                <input type="password" class="grow" placeholder="Password" wire:model="password" />
            </label>
        </div>
        <div class="card-actions">
            <button class="btn btn-primary">
                <x-tabler-login class="size-5" wire:loading.class="loading" />
                <span>Login</span>
            </button>
        </div>
    </form>
</div>
