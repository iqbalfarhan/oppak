<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-md" wire:submit="simpan">
            <div class="flex justify-between">
                <h3 class="font-bold text-lg">Log pergantian rutin</h3>
                <span wire:loading class="loading loading-spinner loading-xs"></span>
            </div>
            <div class="py-4 space-y-2">
                <div class="table-wrapper mb-6">
                    <table class="table table-sm">
                        <tr>
                            <td>Site/STO</td>
                            <td>{{ $site?->label }}</td>
                        </tr>
                        <tr>
                            <td>Perangkat</td>
                            <td>{{ $perangkat?->name }}</td>
                        </tr>
                        <tr>
                            <td>User</td>
                            <td>{{ $user?->name }}</td>
                        </tr>
                    </table>
                </div>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Tanggal pergantian</span>
                    </div>
                    <input type="date" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.tanggal'),
                    ]) wire:model="form.tanggal" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Keterangan pergantian rutin</span>
                    </div>
                    <input type="text" placeholder="Keterangan" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.keterangan'),
                    ])
                        wire:model="form.keterangan" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Photo setelah pergantian</span>
                    </div>
                    <input type="file" @class([
                        'file-input file-input-bordered',
                        'file-input-error' => $errors->first('photo'),
                    ]) wire:model="photo" />
                </label>

                <div class="flex gap-1">
                    @isset($form->pergantian)
                        <div class="avatar">
                            <div class="w-32 rounded-lg">
                                <img src="{{ $form->pergantian->image }}" alt="">
                            </div>
                        </div>
                    @endisset
                    @if ($photo)
                        <div class="avatar">
                            <div class="w-32 rounded-lg">
                                <img src="{{ $photo->temporaryUrl() }}" alt="">
                            </div>
                        </div>
                    @endif
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
