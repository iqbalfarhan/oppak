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
                            <button class="flex gap-3 items-center"
                                wire:click="$dispatch('previewTamu', {tamu: {{ $data->id }}})">
                                <div @class(['avatar', 'placeholder' => !$data->images])>
                                    <div class="w-8 bg-base-300 rounded-full">
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
                                <button class="btn btn-bordered btn-xs btn-square"
                                    wire:click="$dispatch('editTamu', {tamu: {{ $data->id }}})">
                                    <x-tabler-edit class="size-4" />
                                </button>
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
    @livewire('pages.tamu.create')

</div>