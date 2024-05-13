<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="text-lg">Input tamu baru</div>

            <div class="flex flex-col gap-2 py-6">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Nama tamu</span>
                        @error('form.nama')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="text" placeholder="Nama lengkap tamu" @class([
                        'input input-bordered w-full',
                        'input-error' => $errors->first('form.nama'),
                    ])
                        wire:model='form.nama' />
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Perusahaan</span>
                        @error('form.perusahaan')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="text" placeholder="Nama perusahaan tamu" @class([
                        'input input-bordered w-full',
                        'input-error' => $errors->first('form.perusahaan'),
                    ])
                        wire:model='form.perusahaan' />
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Tipe Identitas</span>
                        @error('form.tipe_identitas')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <select type="text" placeholder="Type here" @class([
                        'select select-bordered w-full',
                        'select-error' => $errors->first('form.tipe_identitas'),
                    ])
                        wire:model='form.tipe_identitas'>
                        <option value="">Pilih tipe identitas</option>
                        <option value="ktp">KTP</option>
                        <option value="sim">SIM</option>
                    </select>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Nomor Identitas</span>
                        @error('form.nomor_identitas')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="text" placeholder="Nomor identitas" @class([
                        'input input-bordered w-full',
                        'input-error' => $errors->first('form.nomor_identitas'),
                    ])
                        wire:model='form.nomor_identitas' />
                </label>
                <label class="form-control w-full col-span-2">
                    <div class="label">
                        <span class="label-text">Nomor telepon</span>
                        @error('form.notelp')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="text" placeholder="Nomor telepon" @class([
                        'input input-bordered w-full',
                        'input-error' => $errors->first('form.notelp'),
                    ])
                        wire:model='form.notelp' />
                </label>
                <label class="form-control w-full col-span-2">
                    <div class="label">
                        <span class="label-text">Keperluan</span>
                        @error('form.keperluan')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <textarea placeholder="Keperluan" @class([
                        'textarea textarea-bordered w-full',
                        'textarea-error' => $errors->first('form.keperluan'),
                    ]) wire:model='form.keperluan'></textarea>
                </label>

            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="closeModal" class="btn btn-ghost">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-arrow-right class="size-5" wire:loading.class="loading" />
                    <span>Selanjutnya</span>
                </button>
            </div>
        </form>
    </div>
</div>
