<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'Edit laporan'])

    @if ($laporan->done)
        <div class="card card-compact bg-success text-success-content">
            <div class="card-body">
                <div class="flex items-center gap-3">
                    <x-tabler-circle-check />
                    <span>Status laporan sudah selesai dikerjakan</span>
                </div>
            </div>
        </div>
    @endif

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
        @livewire('pages.laporan.summary.index', ['laporan' => $laporan])
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
    @elseif ($page == 'selesai')
        <div class="card card-divider">
            @if ($laporan->done == false)
                <div class="card-body space-y-4">
                    <h3 class="font-bold text-xl">Selesai membuat laporan</h3>
                    <p class="text-sm">Sebelum merubah status laporan, harap untuk memastikan untuk mengisi semua form
                        yang
                        tersedia (genset, amf, baterai, rectifier,
                        temperatur dan
                        bbm). kemudian klik tombol di bawah ini untuk merubah status laporan menjadi selesai.
                    </p>
                    <div class="card-actions">
                        <button class="btn btn-primary" wire:click="toggleDone" wire:loading.attr="disabled">
                            <x-tabler-check class="size-5" wire:loading.class="loading" />
                            <span>Laporan sudah selesai</span>
                        </button>
                    </div>
                </div>
            @else
                <div class="card-body space-y-4">
                    <h3 class="font-bold text-xl">Selesai membuat laporan</h3>
                    <p class="text-sm">Laporan ini telah selesai dikerjakan. laporan ini sudah tampil di halaman
                        dashboard laporan rutin. jika belum selesai melengkapi data larporan rutin ini, anda bisa
                        kembalikan status laporan ini ke draf dengan klik tombol berikut ini</p>
                    <div class="card-actions">
                        <button class="btn btn-warning" wire:click="toggleDone" wire:loading.attr="disabled">
                            <x-tabler-arrow-back-up class="size-5" wire:loading.class="loading" />
                            <span>Kembalikan ke draft</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>
