<div class="card card-divider">
    <div class="card-body space-y-4">
        <h3 class="font-bold text-xl">Genset</h3>
        <p class="text-sm">Klik tambah genset untuk menambahkan genset, biasanya di Site/STO terdapat lebih dari
            1 genset. isi juga baterai starter pada saat mengisi genset. setelah menambahkan genset, klik tambah baterai
            starter untuk menambahkan baterai starter.</p>

    </div>
    <div class="card-body">
        <div class="grid md:grid-cols-2 gap-6">
            @can('laporan.genset.create')
                <div class="col-span-full">
                    <button class="btn btn-primary" wire:click="$dispatch('createGenset', {laporan: {{ $laporan->id }}})">
                        <x-tabler-plus class="size-5" />
                        <span>Tambah genset</span>
                    </button>
                </div>
            @endcan

            @foreach ($datas as $data)
                <div wire:key="{{ $data->id }}">
                    @livewire('pages.laporan.genset.card', ['genset' => $data], key($data->id))
                </div>
            @endforeach
        </div>
    </div>

    @livewire('pages.laporan.genset.bateraistarter.actions')
    @livewire('pages.laporan.genset.actions')
</div>
