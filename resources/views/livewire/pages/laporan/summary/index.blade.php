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
                            'font-bold',
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

</div>
