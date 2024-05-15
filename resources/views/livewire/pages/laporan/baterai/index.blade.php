<div class="card card-divider">
    <div class="card-body space-y-4">
        <h3 class="font-bold text-xl">Baterai</h3>
        <p class="text-sm">Klik "Tambah baterai" untuk menambahkan baterai. biasanya di site/sto terdapat lebih dari 1
            baterai. Klik "simpan" setelah mengisi form baterai untuk menyimpan data input.</p>
    </div>
    <div class="card-body space-y-6">
        <div class="grid md:grid-cols-2 gap-6">
            <div class="col-span-full">
                <button class="btn btn-primary" wire:click="$dispatch('createBaterai', {laporan: {{ $laporan->id }}})">
                    <x-tabler-plus class="size-5" />
                    <span>Tambah baterai</span>
                </button>
            </div>
            @foreach ($datas as $data)
                <div wire:key="{{ $data->id }}">
                    @livewire('pages.laporan.baterai.card', ['baterai' => $data], key($data->id))
                </div>
            @endforeach
        </div>
    </div>

    @livewire('pages.laporan.baterai.actions')
</div>
