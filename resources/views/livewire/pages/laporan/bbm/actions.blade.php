<div class="card max-w-sm mx-auto">
    <form class="card-body space-y-4" wire:submit="simpan">
        <h3 class="font-bold text-xl">BBM</h3>
        <div class="space-y-2">
            <div class="grid md:grid-cols-2 gap-2 md:gap-6">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Value BBM</span>
                    </div>
                    <input type="number" placeholder="Volume bbm" class="input input-bordered" wire:model="volume" />
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
                <input wire:model="photo" type="file" class="file-input file-input-bordered" accept="image/*" />
            </label>
            <div class="avatar" onclick="document.getElementById('openCamera').click()">
                <div class="w-24 rounded-lg">
                    <img src="{{ $photo ? $photo->temporaryUrl() : $bbm?->image ?? url('noimage.png') }}"
                        alt="">
                </div>
            </div>
            <input type="file" id="openCamera" wire:model="camera" class="hidden" capture="environment">
        </div>
        <div class="card-actions">
            <button class="btn btn-primary">
                <x-tabler-check class="size-5" />
                <span>Simpan</span>
            </button>
        </div>
    </form>
</div>
