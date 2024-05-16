<div class="card card-divider max-w-sm mx-auto">
    <form class="card-body space-y-4" wire:submit="simpan">
        <h3 class="font-bold text-xl">Temperatur ruangan</h3>
        <div class="space-y-2">
            <div class="avatar" onclick="document.getElementById('openCamera').click()">
                <div class="w-full rounded-lg">
                    <img src="{{ $photo ? $photo->temporaryUrl() : $temperatur?->image ?? url('noimage.png') }}"
                        alt="">
                </div>
            </div>
            <input type="file" id="openCamera" wire:model="camera" class="hidden" capture="environment">
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Pilih photo pengukur suhu dari gallery</span>
                </div>
                <input type="file" @class([
                    'file-input file-input-bordered',
                    'file-input-error' => $errors->first('photo'),
                ]) wire:model="photo" accept="image/*" />
            </label>

            <label class="form-control">
                <div class="label">
                    <span class="label-text">Suhu ruangan rectifier</span>
                    <span class="label-text-alt">Celcius</span>
                </div>
                <input type="number" @class([
                    'input input-bordered',
                    'input-error' => $errors->first('rectifier'),
                ]) placeholder="suhu ruangan" wire:model="rectifier" />
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Suhu ruangan metro</span>
                    <span class="label-text-alt">Celcius</span>
                </div>
                <input type="number" @class([
                    'input input-bordered',
                    'input-error' => $errors->first('metro'),
                ]) placeholder="suhu ruangan" wire:model="metro" />
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Suhu ruangan transmisi</span>
                    <span class="label-text-alt">Celcius</span>
                </div>
                <input type="number" @class([
                    'input input-bordered',
                    'input-error' => $errors->first('transmisi'),
                ]) placeholder="suhu ruangan" wire:model="transmisi" />
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Suhu ruangan GPON</span>
                    <span class="label-text-alt">Celcius</span>
                </div>
                <input type="number" @class([
                    'input input-bordered',
                    'input-error' => $errors->first('gpon'),
                ]) placeholder="suhu ruangan" wire:model="gpon" />
            </label>
        </div>

        <div class="card-actions">
            <button class="btn btn-primary">
                <x-tabler-check class="size-5" />
                <span>Simpan</span>
            </button>
        </div>
    </form>
</div>
