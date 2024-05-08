<div class="flex flex-col gap-4 justify-between">
    <div class="flex justify-between gap-1 items-end">
        <div class="flex flex-col">
            <h3 class="font-bold text-lg">Summary laporan rutin</h3>
            <div class="text-xs opacity-70">{{ $tanggal }}</div>
        </div>
        <button class="btn btn-primary" wire:click="$dispatch('filterTanggal')">
            <x-tabler-filter class="size-5" />
            <span class="hidden md:flex">Filter tanggal</span>
        </button>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
        @forelse ($witels as $witel)
            @livewire('widget.laporan-rutin', ['witel' => $witel], key($witel))
        @empty
            <div class="col-span-full">
                @livewire('partial.nocontent', ['title' => 'Belum ada data site yang diinput'])
            </div>
        @endforelse
    </div>
    @livewire('pages.home.cari-tanggal')
    @livewire('pages.laporan.listbywitel')
</div>
