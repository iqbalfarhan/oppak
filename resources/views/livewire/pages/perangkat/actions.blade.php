<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Form perangkat pergantian rutin</h3>
            <div class="py-4 space-y-2">

                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama perangkat</span>
                    </div>
                    <input type="text" placeholder="Nama perangkat" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.name'),
                    ])
                        wire:model="form.name" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Durasi pergantian pln</span>
                        <span class="label-text-alt">bulan</span>
                    </div>
                    <input type="number" placeholder="Durasi pergantian pln" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.durasi_pln'),
                    ])
                        wire:model="form.durasi_pln" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Durasi pergantian solar panel</span>
                        <span class="label-text-alt">bulan</span>
                    </div>
                    <input type="number" placeholder="Durasi pergantian solar panel" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.durasi_solar_cell'),
                    ])
                        wire:model="form.durasi_solar_cell" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Durasi pergantian genset</span>
                        <span class="label-text-alt">bulan</span>
                    </div>
                    <input type="number" placeholder="Durasi pergantian genset" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.durasi_genset'),
                    ])
                        wire:model="form.durasi_genset" />
                </label>

            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="closeModal" class="btn btn-ghost">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
