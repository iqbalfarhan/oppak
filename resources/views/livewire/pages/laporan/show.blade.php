<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'Detail laporan'])


    <div role="tablist" class="tabs tabs-boxed bg-base-300/50 p-2 btn-bordered overflow-x-auto">
        @foreach ($pageList as $list)
            <button role="tab" @class([
                'tab capitalize h-10',
                'tab-active font-bold' => $page == $list,
            ])
                wire:click="$set('page', '{{ $list }}')">{{ $list }}</button>
        @endforeach
    </div>

    @if ($page == 'summary')
        <div class="card divide-y-2 divide-base-300">
            <div class="card-body space-y-4">
                <h3 class="font-bold text-xl">Summary laporan</h3>
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
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
                        </thead>
                    </table>
                </div>
            </div>
            <div class="card-body space-y-4">
                <h3 class="font-bold text-xl">Status pengisian laporan</h3>
                <div class="table-wrapper">
                    <table class="table text-center">
                        <thead>
                            @foreach ($pageList as $key => $list)
                                @if ($key)
                                    <th class="capitalize">{{ $list }}</th>
                                @endif
                            @endforeach
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $laporan->gensets->count() ? 'done' : '...' }}</td>
                                <td>{{ $laporan->amf ? 'done' : '...' }}</td>
                                <td></td>
                                <td></td>
                                <td>{{ $laporan->temperatur ? 'done' : '...' }}</td>
                                <td></td>
                            </tr>
                        </tbody>
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
        </div>
    @elseif ($page == 'genset')
        @livewire('pages.laporan.genset.index', ['laporan' => $laporan])
    @elseif ($page == 'amf')
        @livewire('pages.laporan.amf.actions', ['laporan' => $laporan])
    @elseif ($page == 'baterai')
        <div class="card-body space-y-4">
            <h3 class="font-bold text-xl">Baterai</h3>
        </div>
    @elseif ($page == 'rectifier')
        <div class="card-body space-y-4">
            <h3 class="font-bold text-xl">Rectifier</h3>
        </div>
    @elseif ($page == 'temperatur')
        @livewire('pages.laporan.temperatur.actions', ['laporan' => $laporan])
    @elseif ($page == 'bbm')
        @livewire('pages.laporan.bbm.actions', ['laporan' => $laporan])
    @endif
</div>
