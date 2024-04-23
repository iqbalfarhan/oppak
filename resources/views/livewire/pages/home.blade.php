<div class="page-wrapper">
    @livewire('partial.header')
    <div class="grid md:grid-cols-2 gap-3 md:gap-6">
        @livewire('widget.userinfo')
        @livewire('widget.tanggal')
    </div>

    <div class="divider py-6">Summary laporan</div>

    <div class="flex justify-between gap-1">
        <input type="text" class="input input-bordered" placeholder="Pencarian">
        <div class="join input-bordered">
            <input type="date" class="join-item input">
            <button class="join-item btn btn-ghost">
                <x-tabler-arrow-right class="size-5" />
            </button>
            <input type="date" class="join-item input">
        </div>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-4">
        <div class="col-span-full">
            <h3 class="font-bold text-lg">Summary Laporan rutin</h3>
        </div>
        @foreach ($witels as $witel)
            @livewire('widget.laporan-rutin')
        @endforeach
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-4">
        <div class="col-span-full">
            <h3 class="font-bold text-lg">Summary Laporan insidensial</h3>
        </div>
        @foreach ($witels as $witel)
            @livewire('widget.laporan-rutin')
        @endforeach
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-4">
        <div class="col-span-full">
            <h3 class="font-bold text-lg">Pergantian rutin</h3>
        </div>
        @foreach ($witels as $witel)
            @livewire('widget.laporan-rutin')
        @endforeach
    </div>
</div>
