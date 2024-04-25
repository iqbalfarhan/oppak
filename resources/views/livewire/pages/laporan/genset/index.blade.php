<div class="card-body">
    <div class="grid grid-cols-3 gap-6">
        <div class="col-span-full">
            <button class="btn btn-primary" wire:click="$dispatch('createGenset')">
                <x-tabler-plus class="size-5" />
                <span>Tambah genset</span>
            </button>
        </div>

        @foreach ($datas as $data)
            @livewire('pages.laporan.genset.card', ['genset' => $data])
        @endforeach
    </div>

    @livewire('pages.laporan.genset.actions')
</div>
