<div class="card divide-y-2 divide-base-300 max-w-lg mx-auto">
    <form class="card-body space-y-4" wire:submit="simpan">
        <h3 class="font-bold text-xl">Temperatur ruangan</h3>
        <div class="space-y-2">
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Suhu ruangan rectifier</span>
                </div>
                <div @class([
                    'input input-bordered flex items-center gap-2',
                    'input-error' => $errors->first('rectifier'),
                ])>
                    <input type="number" class="grow" placeholder="Search" wire:model="rectifier" />
                    <span class="badge">Celcius</span>
                </div>
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Suhu ruangan metro</span>
                </div>
                <div @class([
                    'input input-bordered flex items-center gap-2',
                    'input-error' => $errors->first('metro'),
                ])>
                    <input type="number" class="grow" placeholder="Search" wire:model="metro" />
                    <span class="badge">Celcius</span>
                </div>
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Suhu ruangan transmisi</span>
                </div>
                <div @class([
                    'input input-bordered flex items-center gap-2',
                    'input-error' => $errors->first('transmisi'),
                ])>
                    <input type="number" class="grow" placeholder="Search" wire:model="transmisi" />
                    <span class="badge">Celcius</span>
                </div>
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Suhu ruangan GPON</span>
                </div>
                <div @class([
                    'input input-bordered flex items-center gap-2',
                    'input-error' => $errors->first('gpon'),
                ])>
                    <input type="number" class="grow" placeholder="Search" wire:model="gpon" />
                    <span class="badge">Celcius</span>
                </div>
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
