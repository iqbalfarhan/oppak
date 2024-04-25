<div class="flex flex-col gap-4 justify-between">
    <div class="flex justify-between gap-1 items-end">
        <h3 class="font-bold text-lg">Summary Laporan rutin :</h3>
        <button class="btn btn-primary" wire:click="$dispatch('filterTanggal')">
            <x-tabler-filter class="size-5" />
            <span>Filter tanggal</span>
        </button>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
        @foreach ($witels as $witel)
            @livewire('widget.laporan-rutin')
        @endforeach
    </div>
    @livewire('pages.home.cari-tanggal')
</div>
