<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Form baterai</h3>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Photo baterai</span>
                    </div>
                    <input type="file" placeholder="Type here" class="file-input file-input-bordered"
                        wire:model="photo" />
                </label>

                @if ($photo)
                    <div class="avatar">
                        <div class="w-24 rounded-lg">
                            <img src="{{ $photo->temporaryUrl() }}" alt="">
                        </div>
                    </div>
                @endif
                <div class="grid grid-cols-2 gap-x-6 gap-y-2">
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Tegangan total bank I</span>
                        </div>
                        <input type="number" placeholder="Type here" class="input input-bordered"
                            wire:model="form.tegangan.0" />
                    </label>
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Tegangan total bank II</span>
                        </div>
                        <input type="number" placeholder="Type here" class="input input-bordered"
                            wire:model="form.tegangan.1" />
                    </label>
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Tegangan total bank III</span>
                        </div>
                        <input type="number" placeholder="Type here" class="input input-bordered"
                            wire:model="form.tegangan.2" />
                    </label>
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Tegangan total bank IV</span>
                        </div>
                        <input type="number" placeholder="Type here" class="input input-bordered"
                            wire:model="form.tegangan.3" />
                    </label>
                </div>

                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Elektrolit</span>
                    </div>
                    <select type="number" placeholder="Type here" class="select select-bordered"
                        wire:model="form.elektrolit">
                        <option value="diatas maximum">Diatas maximum</option>
                        <option value="normal">Normal</option>
                        <option value="dibawah minimum">Dibawah minimum</option>
                    </select>
                </label>

                <label class="form-control">
                    <div class="label">
                        <span class="label-text">BJ/Cell</span>
                    </div>
                    <input type="number" placeholder="Type here" class="input input-bordered"
                        wire:model="form.bj_cell" />
                </label>

                <div class="grid grid-cols-2 gap-x-6 gap-y-2">

                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">BJ pilot cell bank I</span>
                        </div>
                        <input type="number" placeholder="Type here" class="input input-bordered"
                            wire:model="form.bj_pilot_cell_bank.0" />
                    </label>
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">BJ pilot cell bank II</span>
                        </div>
                        <input type="number" placeholder="Type here" class="input input-bordered"
                            wire:model="form.bj_pilot_cell_bank.1" />
                    </label>
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">BJ pilot cell bank III</span>
                        </div>
                        <input type="number" placeholder="Type here" class="input input-bordered"
                            wire:model="form.bj_pilot_cell_bank.2" />
                    </label>
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">BJ pilot cell bank IV</span>
                        </div>
                        <input type="number" placeholder="Type here" class="input input-bordered"
                            wire:model="form.bj_pilot_cell_bank.3" />
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
