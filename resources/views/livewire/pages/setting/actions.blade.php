<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Pengaturan</h3>
            <div class="py-4 space-y-2">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Nama pengaturan</span>
                    </div>
                    <input type="text" placeholder="Type here" @class([
                        'input input-bordered w-full',
                        'input-error' => $errors->first('form.key'),
                    ]) wire:model="form.key" />
                    @error('form.key')
                        <div class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                    @enderror
                </label>

                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Value pengaturan</span>
                    </div>
                    <input type="text" placeholder="Type here" @class([
                        'input input-bordered w-full',
                        'input-error' => $errors->first('form.value'),
                    ])
                        wire:model="form.value" />
                    @error('form.value')
                        <div class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                    @enderror
                </label>
            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="closeModal" class="btn btn-ghost">Close</button>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
