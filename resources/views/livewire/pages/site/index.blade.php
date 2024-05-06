<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'Site management'])

    <div class="flex flex-col md:flex-row gap-2 justify-between">
        <div class="flex-1">
            <input type="text" class="input input-bordered" placeholder="Pencarian">
        </div>
        @can('site.create')
            <button class="btn btn-primary" wire:click="$dispatch('importSite')">
                <x-tabler-database-import class="size-5" />
                <span>Import</span>
            </button>
            <button class="btn btn-primary" wire:click="$dispatch('createSite')">
                <x-tabler-plus class="size-5" />
                <span>Tambah site</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Witel</th>
                <th>Nama site</th>
                <th>Listrik</th>
                <th>Label</th>
                <th>Users</th>
                @canany(['site.edit', 'site.delete'])
                    <th class="text-center">Action</th>
                @endcanany
            </thead>
            <tbody>
                @forelse ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->witel }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->listrik }}</td>
                        <td>{{ $data->label }}</td>
                        <td>{{ $data->users_count }} user</td>
                        @canany(['site.edit', 'site.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('site.edit')
                                        <button class="btn btn-bordered btn-xs btn-square"
                                            wire:click="$dispatch('editSite', {site: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('site.delete')
                                        <button class="btn btn-bordered btn-xs btn-square"
                                            wire:click="$dispatch('deleteSite', {site: {{ $data->id }}})">
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

    @livewire('pages.site.actions')
    @livewire('pages.site.import')
</div>
