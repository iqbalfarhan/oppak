<div class="page-wrapper">
    @livewire('partial.header')

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
</div>
