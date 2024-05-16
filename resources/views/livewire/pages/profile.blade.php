<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Edit Profile',
    ])

    <div class="card max-w-2xl mx-auto card-divider">
        <form class="card-body" wire:submit="simpan">
            <div class="flex flex-col w-full items-center">
                <div class="avatar" onclick="document.getElementById('openCamera').click()">
                    <div class="w-32 rounded-full btn-bordered">
                        <img src="{{ $photo ? $photo->temporaryUrl() : $user->image }}" />
                    </div>
                </div>
                <div class="text-xs" wire:loading wire:target="photo">Uploading...</div>
                <div class="text-xs" wire:loading wire:target="camera">Uploading...</div>
            </div>
            <input type="file" wire:model="camera" id="openCamera" class="hidden" accept="image/*" capture="user">
            <div class="py-6 grid md:grid-cols-2 gap-x-6 gap-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Ambil photo dari gallery</span>
                    </div>
                    <input type="file" @class([
                        'file-input file-input-bordered',
                        'file-input-error' => $errors->first('photo'),
                    ]) wire:model="photo" accept="image/*" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama lengkap</span>
                    </div>
                    <input type="text" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('name'),
                    ]) wire:model="name" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Username</span>
                    </div>
                    <input type="text" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('username'),
                    ]) wire:model="username" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nomor telepon</span>
                    </div>
                    <input type="text" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('notelp'),
                    ]) wire:model="notelp" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Telegram ID</span>
                    </div>
                    <input type="text" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('telegram_id'),
                    ])
                        wire:model="telegram_id" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Lokasi Site/STO</span>
                    </div>
                    <select @class([
                        'select select-bordered',
                        'select-error' => $errors->first('site_id'),
                    ]) wire:model="site_id">
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
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Password</span>
                    </div>
                    <input type="password" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('password'),
                    ]) wire:model="password"
                        placeholder="Isi untuk merubah password" />
                </label>
            </div>
            <div class="card-action">
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" wire:loading.class="loading" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
        <div class="card-body">
            <h3 class="card-title">Hapus akun</h3>
            <p class="py-2 text-sm opacity-50">
                Menghapus akun akan menghapus semua data mengenai akun tersebut. Harap pastikan lagi untuk
                menghapus akun anda. Klik tombol di bawah ini untuk menonaktifkan akun anda.
            </p>
            <div class="card-actions">
                <button class="btn btn-error" wire:click="$dispatch('deleteAccount', {user: {{ $user->id }}})">
                    <x-tabler-trash class="size-5" />
                    <span>Hapus akun saya</span>
                </button>
            </div>
        </div>
    </div>

    @livewire('pages.user.actions')
</div>
