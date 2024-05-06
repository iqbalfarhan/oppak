<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="import">
            <h3 class="font-bold text-lg">Import data Site/STO</h3>
            <div class="py-4 space-y-4">
                <p class="text-sm">Buat sebuah file untuk import data site dengan format seperti gambar dibawah. Pilih
                    file excel, kemudian klik import.</p>
                <figure class="space-y-2">
                    <img src="{{ url('docs/importsite1.png') }}" alt="import site 1" class="rounded-lg">
                    <p class="text-xs opacity-50">
                        Ketentuan kolom listrik : isi dengan "pln" atau "solar cell" disesuaikan dengan sumber listrik
                        site/sto.
                    </p>
                </figure>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Pilih file</span>
                        @error('file')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="file" @class([
                        'file-input file-input-bordered',
                        'file-input-error' => $errors->first('file'),
                    ]) wire:model="file"
                        accept=".xls,.xlsx,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel,.ods" />
                </div>
            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="closeModal" class="btn btn-ghost">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-database-import class="size-5" wire:loading.class="loading" />
                    <span>Import</span>
                </button>
            </div>
        </form>
    </div>
</div>
