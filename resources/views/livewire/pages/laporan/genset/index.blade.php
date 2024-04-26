<div class="card divide-y-2 divide-base-300">
    <div class="card-body space-y-4">
        <h3 class="font-bold text-xl">Genset</h3>
        <p class="text-sm">Klik tambah genset untuk menambahkan genset, biasanya di Site/STO terdapat lebih dari
            1 genset. isi juga baterai starter pada saat mengisi genset.</p>
    </div>
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

</div>
