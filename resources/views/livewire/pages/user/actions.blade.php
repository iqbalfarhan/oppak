<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-2xl" wire:submit="simpan">
            <div class="card-title">Form user</div>
            <div class="py-4 grid md:grid-cols-2 gap-x-4 gap-y-1">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama user</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.name'),
                    ]) wire:model="form.name"
                        placeholder="Nama lengkap user" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Username login</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.username'),
                    ]) wire:model="form.username"
                        placeholder="Username login" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nomor telepon</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.notelp'),
                    ]) wire:model="form.notelp"
                        placeholder="Nomor telepon" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Telegram ID</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.telegram_id'),
                    ]) wire:model="form.telegram_id"
                        placeholder="Telegram ID" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Hak akses</span>
                    </div>
                    <select type="text" @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.role'),
                    ]) wire:model="form.role">
                        <option value="">Pilih hak akses</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Lokasi Site/STO</span>
                    </div>
                    <select class="select select-bordered" wire:model="form.site_id">
                        <option value="">Pilih site</option>
                        @foreach ($sites as $witel => $site)
                            <optgroup label="{{ $witel }}">
                                @foreach ($site as $item)
                                    <option value="{{ $item->id }}">{{ $item->label }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="resetForm" class="btn btn-ghost">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
