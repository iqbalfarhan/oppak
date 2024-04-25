<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'Detail laporan'])

    <div class="flex flex-wrap gap-1">
        @foreach ($pageList as $list)
            <button @class(['btn capitalize', 'btn-primary' => $page == $list])
                wire:click="$set('page', '{{ $list }}')">{{ $list }}</button>
        @endforeach
    </div>

    <div class="card divide-y-2 divide-base-300">

        @if ($page == 'summary')
            <div class="card-body space-y-4">
                <h3 class="font-bold text-xl">Summary laporan</h3>
                <div class="table-wrapper">
                    <table class="table">
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
                            <td>{{ $laporan->done ? 'Done' : 'Draft' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card-body space-y-4">
                <h3 class="font-bold text-xl">Selesai membuat laporan</h3>
                <p class="text-sm">Sebelum merubah status laporan, harap untuk memastikan untuk mengisi semua form yang
                    tersedia (genset, amf, baterai, rectifier,
                    temperatur dan
                    bbm). kemudian klik tombol di bawah ini untuk merubah status laporan menjadi selesai.
                </p>
                <div class="card-actions">
                    <button class="btn btn-primary" wire:click="toggleDone">
                        <x-tabler-check class="size-5" />
                        <span>Laporan sudah selesai</span>
                    </button>
                </div>
            </div>
        @elseif ($page == 'genset')
            <div class="card-body space-y-4">
                <h3 class="font-bold text-xl">Genset</h3>
                <p class="text-sm">Klik tambah genset untuk menambahkan genset, biasanya di Site/STO terdapat lebih dari
                    1 genset. isi juga baterai starter pada saat mengisi genset.</p>
            </div>
            @livewire('pages.laporan.genset.index', ['laporan' => $laporan])
        @elseif ($page == 'amf')
            <div class="card-body space-y-4">
                <h3 class="font-bold text-xl">AMF - ATS - MDP</h3>
            </div>
        @elseif ($page == 'baterai')
            <div class="card-body space-y-4">
                <h3 class="font-bold text-xl">Baterai</h3>
            </div>
        @elseif ($page == 'rectifier')
            <div class="card-body space-y-4">
                <h3 class="font-bold text-xl">Rectifier</h3>
            </div>
        @elseif ($page == 'temperatur')
            <div class="card-body space-y-4">
                <h3 class="font-bold text-xl">Temperatur</h3>
            </div>
        @elseif ($page == 'bbm')
            <div class="card-body space-y-4">
                <h3 class="font-bold text-xl">BBM</h3>
            </div>
        @endif
    </div>
</div>
