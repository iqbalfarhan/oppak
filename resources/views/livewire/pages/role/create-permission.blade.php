<div>
    <input type="checkbox" id="createPermission" class="modal-toggle" wire:model.live="show" />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <h3 class="font-bold text-lg divider">Create permission</h3>
            <div class="py-4">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama permission</span>
                    </div>
                    <input type="text" placeholder="Nama permisson" class="input input-bordered" wire:model="name" />
                </label>
            </div>
            <div class="modal-action justify-between">
                <label for="createPermission" class="btn">Close!</label>
                <button class="btn btn-primary">simpan</button>
            </div>
        </form>
    </div>
</div>
