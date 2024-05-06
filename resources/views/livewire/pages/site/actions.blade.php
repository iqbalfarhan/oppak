<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <h3 class="font-bold text-lg">Form site</h3>
            <div class="py-4 space-y-2">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Witel</span>
                    </div>
                    <input type="text" placeholder="Type here" @class([
                        'input input-bordered w-full',
                        'input-error' => $errors->first('form.witel'),
                    ])
                        wire:model="form.witel" />
                    @error('form.witel')
                        <div class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                    @enderror
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Nama site</span>
                    </div>
                    <input type="text" placeholder="Type here" @class([
                        'input input-bordered w-full',
                        'input-error' => $errors->first('form.name'),
                    ]) wire:model="form.name" />
                    @error('form.name')
                        <div class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                    @enderror
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Sumber listrik</span>
                    </div>
                    <select type="text" placeholder="Type here" @class([
                        'select select-bordered w-full',
                        'select-error' => $errors->first('form.listrik'),
                    ])
                        wire:model="form.listrik">
                        <option value="">Pilih site</option>
                        @foreach ($listrik as $lstrk)
                            <option value="{{ $lstrk }}">{{ $lstrk }}</option>
                        @endforeach
                    </select>
                    @error('form.listrik')
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
