<div class="card max-w-lg mx-auto">
    <form class="card-body space-y-4" wire:submit="simpan">
        <h3 class="font-bold text-xl">BBM</h3>
        <div class="space-y-2">
            <div class="grid grid-cols-2 gap-6">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Value BBM</span>
                    </div>
                    <input type="number" placeholder="Suhu ruangan" class="input input-bordered" wire:model="volume" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Satuan unit suhu</span>
                    </div>
                    <select class="select select-bordered" wire:model.live="satuan">
                        <option value="liter">Liter</option>
                        <option value="cm">cm (Centimeter)</option>
                    </select>
                </label>
            </div>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Photo indikator BBM</span>
                </div>
                <input wire:model="photo" type="file" class="file-input file-input-bordered" />
            </label>
            <div class="flex gap-1">
                @if ($gambar)
                    <div class="avatar" wire:click="$dispatch('showPreview', {url: '{{ $laporan->bbm->photo }}'})">
                        <div class="w-24 rounded-xl">
                            <img src="{{ $gambar }}" />
                        </div>
                    </div>
                @endif
                @if ($photo)
                    <div class="avatar">
                        <div class="w-24 rounded-xl">
                            <img src="{{ $photo->temporaryUrl() }}" />
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="card-actions">
            <button class="btn btn-primary">
                <x-tabler-check class="size-5" />
                <span>Simpan</span>
            </button>
        </div>
    </form>
</div>
