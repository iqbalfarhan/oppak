<form class="card-body space-y-6" wire:submit="login">
    <div class="space-y-4">
        <input type="text" class="input input-bordered w-full" placeholder="Username" wire:model="username">
        <input type="text" class="input input-bordered w-full" placeholder="Password" wire:model="password">
    </div>
    <div class="card-action">
        <button class="btn btn-primary">
            <x-tabler-login class="icon-5" />
            <span>Login</span>
        </button>
    </div>
</form>
