<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Pengaturan',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('setting.create')
            <button class="btn btn-primary" wire:click="$dispatch('createSetting')">
                <x-tabler-plus class="size-5" />
                <span>Tambah setting</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Key</th>
                <th>Value</th>
                @canany(['setting.edit', 'setting.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @forelse ($datas as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->key }}</td>
                        <td>{{ $data->value }}</td>
                        @canany(['setting.edit', 'setting.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('setting.edit')
                                        <button class="btn btn-bordered btn-square btn-xs"
                                            wire:click="$dispatch('editSetting', {setting: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('setting.delete')
                                        <button class="btn btn-bordered btn-square btn-xs"
                                            wire:click="$dispatch('deleteSetting', {setting: {{ $data->id }}})"
                                            wire:confirm="Yakin akan menghapus?">
                                            <x-tabler-trash class="size-4" />
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        @endcanany
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">@livewire('partial.nocontent')</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @livewire('pages.setting.actions')
</div>
