<div class="page-wrapper">
    @livewire('partial.header', ['Daftar tamu'])

    <div class="flex flex-col md:flex-row justify-between gap-1">
        <input type="text" class="input input-bordered" placeholder="Pencarian">
        <input type="date" class="input input-bordered">
        <a href="{{ route('tamu.create') }}" class="btn btn-primary" wire:navigate>
            <x-tabler-plus class="size-5" />
            <span>Input tamu</span>
        </a>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Keperluan</th>
                <th class="text-center">Masuk</th>
                <th class="text-center">Keluar</th>
                <th class="text-center">Actions</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <div class="flex gap-3 items-center">
                                <button class="avatar placeholder"
                                    wire:click="$dispatch('previewTamu', {tamu: {{ $data->id }}})">
                                    <div class="w-8 bg-base-300 rounded-full">
                                        <span>{{ $data->nama[0] }}</span>
                                    </div>
                                </button>
                                <div class="flex flex-col justify-center">
                                    <div>{{ $data->nama }}</div>
                                    <div class="text-xs opacity-75">({{ $data->perusahaan }})</div>
                                </div>
                            </div>
                        </td>
                        <td class="whitespace-normal min-w-80 text-xs">{{ $data->keperluan }}</td>
                        <td class="text-center">{{ $data->masuk->format('H:i') }}</td>
                        <td>
                            <div class="flex gap-1 justify-center">
                                @if ($data->keluar)
                                    {{ $data->keluar->format('H:i') }}
                                @else
                                    <button class="btn btn-info btn-xs gap-1"
                                        wire:click="$dispatch('exitTamu', {tamu: {{ $data->id }}})">
                                        <x-tabler-logout class="size-4" />
                                        <span>Keluar</span>
                                    </button>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="flex gap-1 justify-center">
                                <a href="" class="btn btn-bordered btn-xs btn-square">
                                    <x-tabler-edit class="size-4" />
                                </a>
                                <button class="btn btn-bordered btn-xs btn-square"
                                    wire:click="$dispatch('deleteTamu', {tamu: {{ $data->id }}})">
                                    <x-tabler-trash class="size-4" />
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('pages.tamu.actions')

</div>
