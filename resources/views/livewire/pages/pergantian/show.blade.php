<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-4xl">
            <h3 class="font-bold text-lg">Riwayat pergantian rutin</h3>
            <div class="py-4 space-y-6">

                <div class="table-wrapper">
                    <table class="table table-sm">
                        <tr>
                            <td>Witel Site STO</td>
                            <td>{{ $site?->label }}</td>
                        </tr>
                        <tr>
                            <td>Nama perangkat</td>
                            <td>{{ $perangkat?->name }}</td>
                        </tr>
                        <tr>
                            <td>Durasi Pergantian</td>
                            <td>{{ $site?->listrik == 'pln' ? $perangkat?->durasi_pln : $perangkat?->durasi_solar_cell }}
                                bulan</td>
                        </tr>
                        @if (count($datas) != 0)
                            <tr>
                                <td>Pergantian selanjutnya</td>
                                <td class="text-warning">{{ $datas->first()->next_action->format('d F Y') }}</td>
                            </tr>
                        @endif
                    </table>
                </div>

                <button class="btn btn-primary"
                    wire:click="$dispatch('createPergantian', { site: {{ $site?->id }}, perangkat: {{ $perangkat?->id }} })">
                    <x-tabler-plus class="size-5" />
                    <span>Input pergantian rutin</span>
                </button>

                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Site</th>
                            <th>Keterangan</th>
                            <th class="text-center">Actions</th>
                        </thead>
                        <tbody>
                            @forelse ($datas as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->tanggal->format('d F Y') }}</td>
                                    <td>
                                        <div class="flex gap-3">
                                            <div>
                                                <div class="avatar"
                                                    wire:click="$dispatch('showPreview', {url:'{{ $data->photo }}'})">
                                                    <div class="w-10 rounded-lg">
                                                        <img src="{{ $data->image }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col">
                                                <div>{{ $data->user->name }}</div>
                                                <div class="text-xs opacity-70">{{ $data->site->label }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-normal md:max-w-72 min-w-72 text-xs">{{ $data->keterangan }}
                                    </td>
                                    <td>
                                        <div class="flex gap-1 justify-center">
                                            <button class="btn btn-xs btn-square btn-bordered"
                                                wire:click="$dispatch('editPergantian', {pergantian: {{ $data->id }}})">
                                                <x-tabler-edit class="size-4" />
                                            </button>
                                            <button class="btn btn-xs btn-square btn-bordered"
                                                wire:click="$dispatch('deletePergantian', {pergantian: {{ $data->id }}})">
                                                <x-tabler-trash class="size-4" />
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">Belum ada log pergantian</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-action">
                <button wire:click="closeModal" class="btn btn-ghost">Close</button>
            </div>
        </div>
    </div>
</div>
