<div class="card card-divider">
    <div class="card-body space-y-4">
        <h3 class="font-bold text-xl">Summary laporan</h3>
        <div class="table-wrapper">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Pembuat laporan</td>
                        <td>:</td>
                        <td>{{ $laporan->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal laporan</td>
                        <td>:</td>
                        <td>{{ $laporan->tanggal->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td>Witel Site / STO</td>
                        <td>:</td>
                        <td>{{ $laporan->site->label }}</td>
                    </tr>
                    <tr>
                        <td>Waktu laporan</td>
                        <td>:</td>
                        <td>{{ $laporan->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td @class([
                            'text-warning' => !$laporan->done,
                            'text-success' => $laporan->done,
                        ])>{{ $laporan->done ? 'Done' : 'Draft' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-body space-y-4">
        <h3 class="font-bold text-xl">Status pengisian laporan</h3>
        <div class="table-wrapper">
            <table class="table text-center">
                <thead>
                    <th class="w-1/6">Genset</th>
                    <th class="w-1/6">AMF</th>
                    <th class="w-1/6">Baterai</th>
                    <th class="w-1/6">Rectifier</th>
                    <th class="w-1/6">Temperatur</th>
                    <th class="w-1/6">BBM</th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="flex justify-center">
                                <x-tabler-circle-check @class(['stroke-success', 'opacity-0' => !$laporan->gensets->count()]) />
                            </div>
                        </td>
                        <td>
                            <div class="flex justify-center">
                                <x-tabler-circle-check @class(['stroke-success', 'opacity-0' => !$laporan->amf]) />
                            </div>
                        </td>
                        <td>
                            <div class="flex justify-center">
                                <x-tabler-circle-check @class([
                                    'stroke-success',
                                    'opacity-0' => !$laporan->baterais->count(),
                                ]) />
                            </div>
                        </td>
                        <td>
                            <div class="flex justify-center">
                                <x-tabler-circle-check @class([
                                    'stroke-success',
                                    'opacity-0' => !$laporan->rectifiers->count(),
                                ]) />
                            </div>
                        </td>
                        <td>
                            <div class="flex justify-center">
                                <x-tabler-circle-check @class(['stroke-success', 'opacity-0' => !$laporan->temperatur]) />
                            </div>
                        </td>
                        <td>
                            <div class="flex justify-center">
                                <x-tabler-circle-check @class(['stroke-success', 'opacity-0' => !$laporan->bbm]) />
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @if ($laporan->done == false)
        <div class="card-body space-y-4">
            <h3 class="font-bold text-xl">Selesai membuat laporan</h3>
            <p class="text-sm">Sebelum merubah status laporan, harap untuk memastikan untuk mengisi semua form yang
                tersedia (genset, amf, baterai, rectifier,
                temperatur dan
                bbm). kemudian klik tombol di bawah ini untuk merubah status laporan menjadi selesai.
            </p>
            <div class="card-actions">
                <button class="btn btn-primary" wire:click="toggleDone" wire:loading.attr="disabled">
                    <x-tabler-check class="size-5" />
                    <span>Laporan sudah selesai</span>
                </button>
            </div>
        </div>
    @endif
</div>
