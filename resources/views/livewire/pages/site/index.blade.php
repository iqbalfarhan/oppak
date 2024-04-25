<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'Site management'])

    <div class="flex flex-col md:flex-row gap-2 justify-between">
        <input type="text" class="input input-bordered" placeholder="Pencarian">
        @can('site.create')
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
                <td class="text-center">Action</td>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->witel }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->listrik }}</td>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('pages.site.actions')
</div>
