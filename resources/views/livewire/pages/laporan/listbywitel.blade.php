<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-4xl space-y-6">
            <h3 class="font-bold text-lg">Laporan rutin {{ $witel }} tanggal {{ date('d F Y') }}</h3>
            <div class="table-wrapper">
                <table class="table">
                    <thead>
                        <th>tanggal</th>
                        <th>Pelapor</th>
                        <th class="text-center">Detail</th>
                    </thead>
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->tanggal->format('d F Y') }}</td>
                            <td>
                                <div class="flex flex-col">
                                    <div>{{ $data->site->label }}</div>
                                    <div class="text-xs opacity-70">{{ $data->user->name }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="flex justify-center">
                                    <a href="{{ route('laporan.show', $data) }}"
                                        class="btn btn-xs btn-bordered btn-square" wire:navigate>
                                        <x-tabler-folder class="size-4" />
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="modal-action justify-between">
                <button wire:click="closeModal" class="btn btn-ghost">Close</button>
            </div>
        </div>
    </div>
</div>
