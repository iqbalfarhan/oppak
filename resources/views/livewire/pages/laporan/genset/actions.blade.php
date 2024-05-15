<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Form input genset</h3>
            <div class="py-6 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Photo genset</span>
                    </div>
                    <input type="file" placeholder="Keterangan genset" class="file-input file-input-bordered"
                        wire:model="photo" capture="environment" />
                </label>
                @if ($photo)
                    <div class="avatar">
                        <div class="w-24 rounded-lg">
                            <img src="{{ $photo->temporaryUrl() }}" alt="">
                        </div>
                    </div>
                @endif
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
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
