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
    @endif
</div>
