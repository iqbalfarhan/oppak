<div class="card card-divider max-w-lg mx-auto">
    <form class="card-body space-y-4" wire:submit="simpan">
        <h3 class="font-bold text-xl">Temperatur ruangan</h3>
        <div class="space-y-2">
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Photo pengukur suhu</span>
                    <span class="label-text-alt">Celcius</span>
                </div>
                <input type="file" @class([
                    'file-input file-input-bordered',
                    'file-input-error' => $errors->first('photo'),
                ]) wire:model="photo" />
            </label>

            <div class="flex gap-1">
                @isset($laporan->temperatur->photo)
                    <div class="avatar">
                        <div class="w-32 rounded-lg">
                            <img src="{{ $laporan->temperatur->image }}" alt="">
                        </div>
                    </div>
                @endisset
                @if ($photo)
                    <div class="avatar">
                        <div class="w-32 rounded-lg">
                            <img src="{{ $photo->temporaryUrl() }}" alt="">
                        </div>
                    </div>
                @endif
            </div>

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
