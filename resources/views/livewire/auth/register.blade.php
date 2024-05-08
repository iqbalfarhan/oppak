<div class="card max-w-sm border-0 shadow-xl">
    <form class="card-body" wire:submit="register">
        <div class="card-title">Register</div>
        <div class="py-4 space-y-1">
            <div class="form-control">
                <label class="label cursor-pointer gap-2 justify-start">
                    <input type="checkbox" class="checkbox checkbox-primary" wire:model.live="ldap" />
                    <span class="label-text">Daftar dengan LDAP</span>
                </label>
            </div>
            @if (!$ldap)
                <label @class([
                    'input input-bordered flex items-center gap-2',
                    'input-error' => $errors->first('name'),
                ])>
                    <x-tabler-user class="size-5" />
                    <input type="text" class="grow" placeholder="Nama lengkap" wire:model="name"
                        autocomplete="name" />
                </label>
            @endif
            <div class="form-control">
                <label @class([
                    'input input-bordered flex items-center gap-2',
                    'input-error' => $errors->first('username'),
                ])>
                    <x-tabler-at class="size-5" />
                    <input type="text" class="grow" placeholder="Username" wire:model="username"
                        autocomplete="username" />
                </label>
                @error('username')
                    <div class="label">
                        <div class="span label-text-alt">{{ $message }}</div>
                    </div>
                @enderror
            </div>
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
                <x-tabler-login class="size-5" />
                <span>Register</span>
            </button>
        </div>
    </form>
</div>
