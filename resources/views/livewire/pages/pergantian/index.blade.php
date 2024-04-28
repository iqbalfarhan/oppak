<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Pergantian rutin',
    ])

    <div class="flex flex-col md:flex-row gap-1">
        <button class="btn btn-primary">
            <x-tabler-plus class="size-5" />
            <span>Buat laporan</span>
        </button>
        <button class="btn btn-primary">
            <x-tabler-check class="size-5" />
            <span>List pergantian</span>
        </button>
    </div>
</div>
