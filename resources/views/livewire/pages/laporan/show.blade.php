<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'Detail laporan'])


    <div role="tablist" class="tabs tabs-boxed bg-base-300/50 p-2 btn-bordered overflow-x-auto">
        @foreach ($pageList as $key => $list)
            <button role="tab" @class([
                'tab capitalize h-10 cursor-pointer',
                'tab-active font-bold' => $page == $key,
            ])
                wire:click="$set('page', '{{ $key }}')">{{ $list }}</button>
        @endforeach
    </div>

    @if ($page == 'summary')
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
                                <td>{{ $laporan->done ? 'Done' : 'Draft' }}</td>
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
                            @foreach ($pageList as $key => $list)
                                @if ($key != 'summary')
                                    <th class="capitalize">{{ $list }}</th>
                                @endif
                            @endforeach
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
        </div>
    @elseif ($page == 'genset')
        @livewire('pages.laporan.genset.index', ['laporan' => $laporan])
    @elseif ($page == 'amf')
        @livewire('pages.laporan.amf.actions', ['laporan' => $laporan])
    @elseif ($page == 'baterai')
        @livewire('pages.laporan.baterai.index', ['laporan' => $laporan])
    @elseif ($page == 'rectifier')
        @livewire('pages.laporan.rectifier.index', ['laporan' => $laporan])
    @elseif ($page == 'temperatur')
        @livewire('pages.laporan.temperatur.actions', ['laporan' => $laporan])
    @elseif ($page == 'bbm')
        @livewire('pages.laporan.bbm.actions', ['laporan' => $laporan])
    @endif
</div>
