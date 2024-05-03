<div class="page-wrapper">
    @livewire('partial.header', ['Daftar tamu'])

    <div class="flex flex-col md:flex-row justify-between gap-1">
        <input type="text" class="input input-bordered" placeholder="Pencarian">
        <input type="date" class="input input-bordered">
        <button class="btn btn-primary" wire:click="$dispatch('createTamu')">
            <x-tabler-plus class="size-5" />
            <span>Input tamu</span>
        </button>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama tamu</th>
                <th>Keperluan</th>
                <th class="text-center">Masuk</th>
                <th class="text-center">Keluar</th>
                @canany(['tamu.show', 'tamu.edit', 'tamu.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <button class="flex gap-3 items-center"
                                wire:click="$dispatch('previewTamu', {tamu: {{ $data->id }}})">
                                <div @class(['avatar', 'placeholder' => !$data->images])>
                                    <div class="w-8 bg-base-300 rounded-lg">
                                        @if ($data->images)
                                            <img src="{{ Storage::url($data->images[0]) }}" alt="">
                                        @else
                                            <span>{{ $data->nama[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex flex-col items-start">
                                    <div>{{ $data->nama }}</div>
                                    <div class="text-xs opacity-75">({{ $data->perusahaan }})</div>
                                </div>
                            </button>
                        </td>
                        <td class="whitespace-normal min-w-60 max-w-80 text-sm">{{ $data->keperluan }}</td>
                        <td class="text-center">{{ $data->masuk->format('H:i') }}</td>
                        <td>
                            <div class="flex gap-1 justify-center">
                                @if ($data->keluar)
                                    {{ $data->keluar->format('H:i') }}
                                @else
                                    @can('tamu.setkeluar')
                                        <button class="btn btn-info btn-xs gap-1"
                                            wire:click="$dispatch('exitTamu', {tamu: {{ $data->id }}})">
                                            <x-tabler-logout class="size-4" />
                                            <span>Keluar</span>
                                        </button>
                                    @endcan
                                @endif
                            </div>
                        </td>
                        @canany(['tamu.show', 'tamu.edit', 'tamu.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('tamu.show')
                                        <a href="{{ route('tamu.show', $data) }}" class="btn btn-bordered btn-xs btn-square">
                                            <x-tabler-folder class="size-4" />
                                        </a>
                                    @endcan
                                    @can('tamu.edit')
                                        <button class="btn btn-bordered btn-xs btn-square"
                                            wire:click="$dispatch('editTamu', {tamu: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('tamu.delete')
                                        <button class="btn btn-bordered btn-xs btn-square"
                                            wire:click="$dispatch('deleteTamu', {tamu: {{ $data->id }}})">
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

    @livewire('pages.tamu.actions')
    @livewire('pages.tamu.create')

</div>
