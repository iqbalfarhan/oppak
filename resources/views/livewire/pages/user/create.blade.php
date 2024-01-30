<div>
    <input type="checkbox" id="createUser" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="divider">
                <h3 class="font-bold text-lg text-center">Create new user</h3>
            </div>
            <div class="py-4 space-y-2">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Nama user</span>
                    </label>
                    <input type="text" class="input input-bordered" placeholder="Nama user" wire:model="form.name">
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <input type="text" class="input input-bordered" placeholder="Username"
                        wire:model="form.username">
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" class="input input-bordered" placeholder="Password"
                        wire:model="form.password">
                </div>
            </div>
            <div class="modal-action justify-between">
                <label for="createUser" class="btn">Close</label>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
