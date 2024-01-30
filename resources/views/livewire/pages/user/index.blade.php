<div class="page-wrapper">
    @livewire('partial.header')

    <div class="flex justify-between">
        <input type="text" class="input input-bordered" placeholder="Pencarian" wire:model.live="cari">
        <button class="btn btn-primary">
            <x-tabler-circle-plus class="icon-5" />
            <span>Create User</span>
        </button>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama user</th>
                <th>created at</th>
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
                        <td>{{ $data->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="flex gap-1">
                                <button class="btn btn-xs btn-neutral">
                                    <x-tabler-key class="icon-4" />
                                    <span>Reset</span>
                                </button>
                                <button class="btn btn-xs btn-info">
                                    <x-tabler-folder class="icon-4" />
                                    <span>Detail</span>
                                </button>
                                <button class="btn btn-xs btn-success">
                                    <x-tabler-edit class="icon-4" />
                                    <span>Edit</span>
                                </button>
                                <button class="btn btn-xs btn-error" wire:click="deleteUser({{ $data->id }})"
                                    wire:confirm="anda yakin akan menghapus data ini.">
                                    <x-tabler-trash class="icon-4" />
                                    <span>Delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
