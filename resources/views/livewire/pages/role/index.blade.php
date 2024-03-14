<div class="page-wrapper">
    @livewire('partial.header')

    <div class="flex justify-between">
        <input type="search" class="input input-bordered" placeholder="Pencarian" wire:model.live="cari">
        <div class="flex gap-1">
            <label for="createRole" class="btn border-2 border-base-300">
                <x-tabler-circle-plus class="icon-5" />
                <span>Role</span>
            </label>
            <label for="createPermission" class="btn border-2 border-base-300">
                <x-tabler-circle-plus class="icon-5" />
                <span>Permission</span>
            </label>
        </div>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Role name</th>
                <th>Permissions</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr wire:key="{{ $role->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            {{ $role->getPermissionNames() }}
                        </td>
                        <td>
                            <div class="flex gap-1">
                                <button class="btn btn-xs btn-success">
                                    <x-tabler-edit class="icon-4" />
                                    <span class="hidden md:flex">Edit</span>
                                </button>
                                <button class="btn btn-xs btn-error" wire:click="deleteUser({{ $role->id }})"
                                    wire:confirm="anda yakin akan menghapus role ini.">
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

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>Permission name</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr wire:key="{{ $permission->id }}">
                        <td>{{ $permission->name }}</td>
                        <td>
                            <div class="flex gap-1">
                                <button class="btn btn-xs btn-success">
                                    <x-tabler-edit class="icon-4" />
                                    <span class="hidden md:flex">Edit</span>
                                </button>
                                <button class="btn btn-xs btn-error" wire:click="deleteUser({{ $permission->id }})"
                                    wire:confirm="anda yakin akan menghapus permission ini.">
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

    @livewire('pages.role.create-role')
    @livewire('pages.role.create-permission')
</div>
