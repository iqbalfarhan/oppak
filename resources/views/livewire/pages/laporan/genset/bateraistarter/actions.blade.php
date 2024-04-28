<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box space-y-4" wire:submit="simpan">
            <h3 class="font-bold text-lg">Baterai starter genset</h3>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Tegangan baterai starter</span>
                    </div>
                    <input type="number" placeholder="Type here" class="input input-bordered"
                        wire:model="form.tegangan" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">BJ/Cell</span>
                    </div>
                    <input type="number" placeholder="Type here" class="input input-bordered"
                        wire:model="form.bj_cell" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">BJ pilot cell</span>
                    </div>
                    <input type="number" placeholder="Type here" class="input input-bordered"
                        wire:model="form.bj_pilot_cell" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Level elektrolit</span>
                    </div>
                    <input type="number" placeholder="Type here" class="input input-bordered"
                        wire:model="form.elektrolit" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Kekencangan kabel</span>
                    </div>
                    <select type="number" placeholder="Type here" class="select select-bordered"
                        wire:model="form.kencang">
                        <option value="1">Kencang</option>
                        <option value="0">Tidak Kencang</option>
                    </select>
                </label>
            </div>
            <div class="modal-action justify-between">
                <button type="button" class="btn btn-ghost" wire:click="closeModal">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
