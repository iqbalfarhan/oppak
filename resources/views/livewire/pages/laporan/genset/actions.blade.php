<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Form input genset</h3>
            <div class="py-6 space-y-2">
                <div class="avatar" onclick="document.getElementById('openCamera').click()">
                    <div class="w-24 rounded-lg">
                        <img src="{{ $photo ? $photo->temporaryUrl() : $form->genset?->gambar ?? url('noimage.png') }}"
                            alt="">
                    </div>
                </div>
                <input type="file" id="openCamera" wire:model="camera" class="hidden" capture="environment">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Pilih photo dari gallery</span>
                    </div>
                    <input type="file" placeholder="Keterangan genset" @class([
                        'file-input file-input-bordered',
                        'file-input' => $errors->first('photo'),
                    ])
                        wire:model="photo" accept="image/*" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Keterangan genset</span>
                    </div>
                    <input type="text" placeholder="Keterangan genset" class="input input-bordered"
                        wire:model="form.keterangan" />
                </label>
                <div class="grid grid-cols-2 gap-6">
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Ruangan Bersih</span>
                        </div>
                        <select class="select select-bordered" wire:model="form.ruangan_bersih">
                            <option value="1">Bersih</option>
                            <option value="0">Tidak bersih</option>
                        </select>
                    </label>
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Engine bersih</span>
                        </div>
                        <select class="select select-bordered" wire:model="form.engine_bersih">
                            <option value="1">Bersih</option>
                            <option value="0">Tidak bersih</option>
                        </select>
                    </label>
                </div>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Suhu ruangan</span>
                        <span class="label-text-alt">celcius</span>
                    </div>
                    <input type="number" placeholder="Tulis suhu ruangan dalam angka" class="input input-bordered"
                        wire:model="form.suhu_ruangan" />
                </label>
                <div class="grid grid-cols-2 gap-6">
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">BBM Utama</span>
                        </div>
                        <input type="number" placeholder="BBM Utama" class="input input-bordered"
                            wire:model="form.bbm_utama" />
                    </label>
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">BBM harian</span>
                        </div>
                        <input type="number" placeholder="BBM harian" class="input input-bordered"
                            wire:model="form.bbm_harian" />
                    </label>
                </div>
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
