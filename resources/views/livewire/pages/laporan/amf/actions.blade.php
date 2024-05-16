<form class="space-y-6" wire:submit="simpan">
    <div class="card card-divider">
        <div class="card-body py-4 bg-base-200/50">
            <h3 class="font-bold">Info AMF</h3>
        </div>
        <div class="card-body grid md:grid-cols-3 gap-2 md:gap-6">
            <div class="form-control w-full">
                <div class="label">
                    <span class="label-text">Photo ATS dari gallery</span>
                </div>
                <input type="file" class="file-input file-input-bordered w-full" wire:model="photo"
                    accept="image/*" />

                <div class="avatar" onclick="document.getElementById('openCamera').click()">
                    <div class="w-24 rounded-lg">
                        <img src="{{ $photo ? $photo->temporaryUrl() : $form->amf?->image ?? url('noimage.png') }}"
                            alt="">
                    </div>
                </div>
                <input type="file" id="openCamera" wire:model="camera" class="hidden" capture="environment">
            </div>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Kebersihan ruangan</span>
                </div>
                <select class="select select-bordered" wire:model="form.ruangan_bersih">
                    <option value="1">Bersih</option>
                    <option value="0">Tidak bersih</option>
                </select>
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Kebersihan engine</span>
                </div>
                <select class="select select-bordered" wire:model="form.engine_bersih">
                    <option value="1">Bersih</option>
                    <option value="0">Tidak bersih</option>
                </select>
            </label>
        </div>
    </div>
    <div class="card card-divider">
        <div class="card-body py-4 bg-base-200/50">
            <h3 class="font-bold">Arus beban (Ampere)</h3>
        </div>
        <div class="card-body grid md:grid-cols-3 gap-2 md:gap-6">
            <div class="form-control">
                <div class="label">
                    <span class="label-text">Arus beban R</span>
                    <span class="label-text-alt">Ampere</span>
                </div>
                <input type="number" @class([
                    'input input-bordered flex items-center gap-2',
                    'input-error' => false,
                ]) placeholder="Arus beban R"
                    wire:model='form.arus.R' />
            </div>
            <div class="form-control">
                <div class="label">
                    <span class="label-text">Arus beban S</span>
                    <span class="label-text-alt">Ampere</span>
                </div>
                <input type="number" @class([
                    'input input-bordered flex items-center gap-2',
                    'input-error' => false,
                ]) placeholder="Arus beban S"
                    wire:model='form.arus.S' />
            </div>
            <div class="form-control">
                <div class="label">
                    <span class="label-text">Arus beban T</span>
                    <span class="label-text-alt">Ampere</span>
                </div>
                <input type="number" @class([
                    'input input-bordered flex items-center gap-2',
                    'input-error' => false,
                ]) placeholder="Arus beban T"
                    wire:model='form.arus.T' />
            </div>
        </div>
    </div>
    <div class="card card-divider">
        <div class="card-body py-4 bg-base-200/50">
            <div class="font-bold">Tegangan (Volt)</div>
        </div>
        <div class="card-body grid md:grid-cols-3 gap-2 md:gap-6">
            <div class="form-control">
                <div class="label">
                    <span class="label-text">R-S</span>
                    <span class="label-text-alt">Volt</span>
                </div>
                <input type="number" @class(['input input-bordered', 'input-error' => false]) placeholder="Volt" wire:model="form.tegangan.R-S" />
            </div>
            <div class="form-control">
                <div class="label">
                    <span class="label-text">S-T</span>
                    <span class="label-text-alt">Volt</span>
                </div>
                <input type="number" @class(['input input-bordered', 'input-error' => false]) placeholder="Volt" wire:model="form.tegangan.S-T" />
            </div>
            <div class="form-control">
                <div class="label">
                    <span class="label-text">T-R</span>
                    <span class="label-text-alt">Volt</span>
                </div>
                <input type="number" @class(['input input-bordered', 'input-error' => false]) placeholder="Volt" wire:model="form.tegangan.T-R" />
            </div>
            <div class="form-control">
                <div class="label">
                    <span class="label-text">R-N</span>
                    <span class="label-text-alt">Volt</span>
                </div>
                <input type="number" @class(['input input-bordered', 'input-error' => false]) placeholder="Volt" wire:model="form.tegangan.R-N" />
            </div>
            <div class="form-control">
                <div class="label">
                    <span class="label-text">S-N</span>
                    <span class="label-text-alt">Volt</span>
                </div>
                <input type="number" @class(['input input-bordered', 'input-error' => false]) placeholder="Volt" wire:model="form.tegangan.S-N" />
            </div>
            <div class="form-control">
                <div class="label">
                    <span class="label-text">T-N</span>
                    <span class="label-text-alt">Volt</span>
                </div>
                <input type="number" @class(['input input-bordered', 'input-error' => false]) placeholder="Volt"
                    wire:model="form.tegangan.T-N" />
            </div>
        </div>
    </div>
    <div class="card card-divider">
        <div class="card-body py-4 bg-base-200/50">
            <div class="font-bold">Lainnya</div>
        </div>
        <div class="card-body grid md:grid-cols-3 gap-2 md:gap-6">

            <div class="form-control">
                <div class="label">
                    <span class="label-text">KWH (Setiap tanggal 1)</span>
                </div>
                <input type="number" @class(['input input-bordered', 'input-error' => false]) placeholder="KWH meter setiap tanggal 1"
                    wire:model="form.kwh" />
            </div>
            <div class="form-control">
                <div class="label">
                    <span class="label-text">Jam jalan genset (mingguan)</span>
                </div>
                <input type="number" @class(['input input-bordered', 'input-error' => false]) placeholder="Jam jalan genset mingguan"
                    wire:model="form.jam_jalan_genset" />
            </div>
        </div>
    </div>
    <div class="card col-span-full">
        <div class="card-body">
            <div class="card-actions">
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </div>
    </div>
</form>
