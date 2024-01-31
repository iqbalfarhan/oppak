<div class="page-wrapper">
    @livewire('partial.header')
    <div class="flex flex-col md:flex-row justify-between">
        <input type="search" class="input input-bordered" placeholder="Pencarian" wire:model.live="cari">
    </div>
    <div class="table-wrapper">
        <table class="table">
            @foreach ($datas as $witel => $sites)
                <thead class="bg-base-200">
                    <th colspan="2">{{ $witel }}</th>
                </thead>
                <tbody>
                    @foreach ($sites as $site)
                        <tr>
                            <td>{{ $site->name }}</td>
                            <td>
                                <div class="flex gap-1 justify-end">
                                    <button class="btn btn-xs btn-success"
                                        wire:click="$dispatch('editUser', {user:{{ $site->id }}})">
                                        <x-tabler-edit class="icon-4" />
                                        <span class="hidden md:flex">Edit</span>
                                    </button>
                                    <button class="btn btn-xs btn-error" wire:click="deleteUser({{ $site->id }})"
                                        wire:confirm="anda yakin akan menghapus site ini.">
                                        <x-tabler-trash class="icon-4" />
                                        <span class="hidden md:flex">Delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endforeach
        </table>
    </div>
</div>
