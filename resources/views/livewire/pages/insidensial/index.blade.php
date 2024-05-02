<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Laporan insidensial',
    ])

    <div class="flex flex-col md:flex-row justify-between gap-2">
        <input type="search" class="input input-bordered" placeholder="Pencarian">
        @can('insidensial.create')
            <button class="btn btn-primary" wire:click="$dispatch('createInsidensial')">
                <x-tabler-plus class="size-5" />
                <span>Buat laporan insidensial</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pelapor</th>
                <th>Kategori</th>
                <th>Uraian laporan</th>
                @canany(['insidensial.edit', 'insidensial.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->created_at->format('d F Y') }}</td>
                        <td>
                            <div class="flex flex-col gap-1">
                                <div>{{ $data->user->name }}</div>
                                <div class="text-xs opacity-75">{{ $data->site->label }}</div>
                            </div>
                        </td>
                        <td>{{ $data->kategori }}</td>
                        <td class="whitespace-normal min-w-80 max-w-80 text-xs">
                            <div class="flex items-center gap-3">
                                <div class="avatar"
                                    wire:click="$dispatch('showPreview', {url : '{{ $data->photo }}'})">
                                    <div class="w-10 rounded-lg btn-bordered">
                                        <img src="{{ $data->image }}" />
                                    </div>
                                </div>
                                {{ $data->uraian }}
                            </div>
                        </td>
                        @canany(['insidensial.edit', 'insidensial.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('insidensial.edit')
                                        <button class="btn btn-bordered btn-xs btn-square"
                                            wire:click="$dispatch('editInsidensial', {insidensial: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('insidensial.delete')
                                        <button class="btn btn-bordered btn-xs btn-square"
                                            wire:click="$dispatch('deleteInsidensial', {insidensial: {{ $data->id }}})">
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

    @livewire('pages.insidensial.actions')
</div>
