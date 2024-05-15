<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <h3 class="font-bold text-lg">Laporan insidensial</h3>
            <div class="py-4 space-y-2">
                <div class="flex justify-center">
                    <div class="avatar">
                        <div class="w-48 rounded-lg btn-bordered">
                            <img src="{{ $photo ? $photo->temporaryUrl() : $oldPhoto ?? url('noimage.png') }}" />
                        </div>
                    </div>
                </div>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Photo laporan</span>
                    </div>
                    <input type="file" placeholder="Type here" @class([
                        'file-input file-input-bordered',
                        'file-input-error' => $errors->first('photo'),
                    ]) wire:model="photo"
                        capture="environment" />
                    @error('photo')
                        <div class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                    @enderror
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Kategori laporan</span>
                    </div>
                    <select class="select select-bordered" wire:model="form.kategori">
                        <option value="">Pilih kategori</option>
                        @foreach ($kategories as $kategory)
                            <option value="{{ $kategory }}">{{ $kategory }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Uraian laporan</span>
                    </div>
                    <textarea type="text" placeholder="Uraian laporan" class="textarea textarea-bordered" wire:model="form.uraian"></textarea>
                </label>
            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="closeModal" class="btn btn-ghost">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" wire:loading.class="loading" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
