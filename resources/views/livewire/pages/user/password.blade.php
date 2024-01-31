<div>
    <input type="checkbox" id="passwordUser" class="modal-toggle" wire:model.live="show" />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="divider">
                <h3 class="font-bold text-lg text-center">Reset password</h3>
            </div>
            <div class="py-4">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Password baru</span>
                        <button type="button" wire:click="generateRandomPassword" class="btn btn-xs">Generate</button>
                    </label>
                    <input type="text" class="input input-bordered @error('password') input-error @enderror"
                        placeholder="Password" wire:model="password">
                    <label for="" class="label">
                        @error('password')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
            </div>
            <div class="modal-action justify-between">
                <button class="btn" type="button" wire:click="resetForm">Close</button>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
