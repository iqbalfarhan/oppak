<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Form Rectifier</h3>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Keterangan rectifier</span>
                    </div>
                    <input type="text" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.keterangan'),
                    ])
                        wire:model="form.keterangan" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Catuan input</span>
                    </div>
                    <input type="number" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.catuan_input'),
                    ])
                        wire:model="form.catuan_input" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Tegangan Output</span>
                    </div>
                    <input type="number" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.tegangan_output'),
                    ])
                        wire:model="form.tegangan_output" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Arus output</span>
                    </div>
                    <input type="number" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.arus_output'),
                    ])
                        wire:model="form.arus_output" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Ambil photo rectifier dari gallery</span>
                    </div>
                    <input type="file" @class([
                        'file-input file-input-bordered',
                        'file-input-error' => $errors->first('photo'),
                    ]) wire:model="photo" />
                </label>

                <div class="avatar" onclick="document.getElementById('openCamera').click()">
                    <div class="w-24 rounded-lg">
                        <img src="{{ $photo ? $photo->temporaryUrl() : $form->rectifier?->image ?? url('noimage.png') }}"
                            alt="">
                    </div>
                </div>
                <input type="file" id="openCamera" wire:model="camera" class="hidden">
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
