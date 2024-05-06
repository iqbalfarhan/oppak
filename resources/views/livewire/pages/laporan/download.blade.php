<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Download laporan',
    ])
    <div class="card card-divider">
        <div class="card-body space-y-4">
            <div class="card-title font-bold">Download laporan rutin</div>
            <p class="text-sm">Untuk mendownload data laporan rutin, silakan untuk memilih terlebih dulu tanggal awal dan
                tanggal akhir
                kemudian klik selanjutnya. Jika ingin mendownload 1 tanggal saja, isi tanggal awal dan tanggal akhir
                dengan tanggal yang dipilih dan klik tombol selanjutnya.</p>
        </div>
        <div class="card-body bg-base-200/50 py-4">
            <form class="card-actions justify-between" wire:submit="filter">
                <div class="join btn-bordered">
                    <input type="date" @class([
                        'join-item input',
                        'input-error' => $errors->first('tanggal.0'),
                    ]) wire:model="tanggal.0">
                    <div class="join-item btn btn-circle">
                        <x-tabler-arrow-right class="size-5" />
                    </div>
                    <input type="date" @class([
                        'join-item input',
                        'input-error' => $errors->first('tanggal.1'),
                    ]) wire:model="tanggal.1">
                </div>
                <button class="btn btn-primary">
                    <x-tabler-arrow-right class="size-5" />
                    <span>Selanjutnya</span>
                </button>
            </form>
        </div>
    </div>
</div>
