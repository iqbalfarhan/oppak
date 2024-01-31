<div>
    <input type="checkbox" id="createLokasi" class="modal-toggle" wire:model.live="show" />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-3xl" wire:submit="simpan">
            <div class="divider">
                <h3 class="font-bold text-lg text-center">{{ isset($form->user) ? 'Edit' : 'Create new' }} user</h3>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="py-4 space-y-2">
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text">Nama user</span>
                            @error('form.name')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="text" class="input input-bordered @error('form.name') input-error @enderror"
                            placeholder="Nama user" wire:model.live="form.name">
                    </div>
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text">Username</span>
                            @error('form.username')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="text" class="input input-bordered @error('form.username') input-error @enderror"
                            placeholder="Username" wire:model="form.username">
                    </div>
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text">Password</span>
                            @error('form.password')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="password"
                            class="input input-bordered @error('form.password') input-error @enderror"
                            placeholder="Password" wire:model="form.password">
                    </div>
                </div>
                <div class="py-4 space-y-2">
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text">Lokasi</span>
                            @error('form.lokasi_id')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <select class="select select-bordered @error('form.lokasi_id') select-error @enderror"
                            wire:model="form.lokasi_id">
                            <option value="">Pilih lokasi</option>
                            @foreach ($lokasis as $witel => $lokasi)
                                <optgroup label="{{ $witel }}">
                                    @foreach ($lokasi as $site)
                                        <option value="{{ $site->id }}">{{ $site->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text">Access roles</span>
                            @error('form.roles')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        @foreach ($roles as $role)
                            <label class="flex gap-2 items-center">
                                <input type="checkbox" wire:model.live="form.roles" value="{{ $role }}"
                                    class="toggle toggle-xs checked:toggle-primary">
                                {{ $role }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-action justify-between">
                <button class="btn" type="button" wire:click="resetForm">Close</button>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
