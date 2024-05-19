<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Hello!</h3>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama parameter</span>
                    </div>
                    <input type="text" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.name'),
                    ]) wire:model="form.name" />
                </label>
                <div class="grid grid-cols-2 gap-4">
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Satuan parameter</span>
                        </div>
                        <input type="text" placeholder="Type here" @class([
                            'input input-bordered',
                            'input-error' => $errors->first('form.satuan'),
                        ])
                            wire:model="form.satuan" />
                    </label>
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Label parameter</span>
                        </div>
                        <input type="text" placeholder="Type here" @class([
                            'input input-bordered',
                            'input-error' => $errors->first('form.label'),
                        ])
                            wire:model="form.label" />
                    </label>
                </div>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Tipe parameter</span>
                    </div>
                    <select @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.type'),
                    ]) wire:model.live="form.type">
                        <option value="range">Antara (range)</option>
                        <option value="istrue">Benar apabila</option>
                    </select>
                </label>
                @isset($form->type)
                    <div class="divider py-4 text-xs">options</div>
                @endisset
                @if ($form->type == 'range')
                    <div class="grid grid-cols-2 gap-4">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">Nilai minimal</span>
                            </div>
                            <input type="number" step="0.001" placeholder="Type here" @class([
                                'input input-bordered',
                                'input-error' => $errors->first('form.min'),
                            ])
                                wire:model="form.min" />
                        </label>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">Nilai maksimal</span>
                            </div>
                            <input type="number" step="0.001" placeholder="Type here" @class([
                                'input input-bordered',
                                'input-error' => $errors->first('form.max'),
                            ])
                                wire:model="form.max" />
                        </label>
                    </div>
                @else
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Pilihan</span>
                            <span class="label-text-alt">Pisahkan option dengan komma</span>
                        </div>
                        <input type="text" placeholder="Type here" @class([
                            'input input-bordered',
                            'input-error' => $errors->first('options'),
                        ])
                            wire:model.lazy="options" />
                    </label>
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Pilahan nilai benar</span>
                        </div>
                        <select @class([
                            'select select-bordered',
                            'select-error' => $errors->first('form.trueif'),
                        ]) wire:model="form.trueif">
                            <option value=""></option>
                            @foreach (array_map('trim', explode(',', $options)) ?? [] as $opt)
                                <option value="{{ $opt }}">{{ $opt }}</option>
                            @endforeach
                        </select>
                    </label>
                @endif
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
