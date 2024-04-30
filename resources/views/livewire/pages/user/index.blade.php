<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'User management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('user.create')
            <button class="btn btn-primary" wire:click="$dispatch('createUser')">
                <x-tabler-plus class="size-5" />
                <span>Tambah user</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama lengkap user</th>
                <th>Site/STO</th>
                <th>Kontak</th>
                <th>Role</th>
                <th class="text-center">Active</th>
                @canany(['user.resetpassword', 'user.edit', 'user.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}" @class(['line-through' => !$data->active])>
                        <td>{{ $no++ }}</td>
                        <td>
                            <div class="flex gap-3 items-center">
                                <div class="avatar">
                                    <div class="w-10 rounded-full">
                                        <img src="{{ $data->image }}" />
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <span>{{ $data->name }}</span>
                                    <span class="text-xs opacity-70">{{ $data->username }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $data->site?->label }}</td>
                        <td>
                            <div class="flex flex-col">
                                <span>{{ $data->notelp }}</span>
                                <span class="text-xs opacity-70">{{ $data->telegram_id }}</span>
                            </div>
                        </td>
                        <td>{{ $data->getRoleNames()->first() }}</td>
                        <td>
                            <div class="flex justify-center">
                                <input type="checkbox" @class(['toggle toggle-sm toggle-primary']) @checked($data->active)
                                    wire:change="$dispatch('toggleActive', {user: {{ $data->id }}})"
                                    @disabled(!$user->can('user.setactive')) />
                            </div>
                        </td>
                        @canany(['user.resetpassword', 'user.edit', 'user.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('user.resetpassword')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('resetPasswordUser', {user: {{ $data->id }}})">
                                            <x-tabler-key class="size-4" />
                                        </button>
                                    @endcan
                                    @can('user.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editUser', {user: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('user.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteUser', {user: {{ $data->id }}})">
                                            <x-tabler-trash class="size-4" />
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        @endcanany
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('pages.user.actions')
</div>
