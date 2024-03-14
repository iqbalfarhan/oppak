<div class="page-wrapper">
    @livewire('partial.header')

    <div class="flex flex-col md:flex-row justify-between">
        <input type="search" class="input input-bordered" placeholder="Pencarian" wire:model.live="cari">
        <button class="btn border-2 border-base-300" wire:click="$dispatch('createUser')">
            <x-tabler-circle-plus class="icon-5" />
            <span>Create User</span>
        </button>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama user</th>
                <th>Lokasi jaga</th>
                <th>Roles</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>
                            <div class="flex gap-2">
                                <div class="flex justify-center items-center">
                                    <div class="avatar">
                                        <div class="w-8 rounded-full">
                                            <img src="{{ $data->image }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <span>{{ $data->name }}</span>
                                    <span class="text-xs opacity-50">{{ $data->username }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ $data->lokasi->label ?? '' }}
                        </td>
                        <td>{{ implode(', ', $data->getRoleNames()->toArray()) }}</td>
                        <td>
                            <div class="flex gap-1">
                                <button class="btn btn-xs btn-neutral"
                                    wire:click="$dispatch('resetUser', {user:{{ $data->id }}})">
                                    <x-tabler-key class="icon-4" />
                                    <span class="hidden md:flex">Reset</span>
                                </button>
                                <button class="btn btn-xs btn-success"
                                    wire:click="$dispatch('editUser', {user:{{ $data->id }}})">
                                    <x-tabler-edit class="icon-4" />
                                    <span class="hidden md:flex">Edit</span>
                                </button>
                                <button class="btn btn-xs btn-error" wire:click="deleteUser({{ $data->id }})"
                                    wire:confirm="anda yakin akan menghapus data ini.">
                                    <x-tabler-trash class="icon-4" />
                                    <span class="hidden md:flex">Delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('pages.user.create')
    @livewire('pages.user.password')
</div>
