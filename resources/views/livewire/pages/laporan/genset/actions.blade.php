<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Form input genset</h3>
            <div class="py-6 space-y-2">
                <div class="avatar">
                    <div class="w-32 rounded-xl">
                        <img src="{{ url('noimage.png') }}" />
                    </div>
                </div>
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
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered"
                        wire:model="form.suhu_ruangan" />
                </label>
                <div class="grid grid-cols-2 gap-6">
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">BBM Utama</span>
                        </div>
                        <input type="text" placeholder="BBM Utama" class="input input-bordered"
                            wire:model="form.bbm_utama" />
                    </label>
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">BBM harian</span>
                        </div>
                        <input type="text" placeholder="BBM harian" class="input input-bordered"
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
