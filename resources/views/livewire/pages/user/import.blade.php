<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="import">
            <h3 class="font-bold text-lg">Import data User</h3>
            <div class="py-4 space-y-4">
                <p class="text-sm">Buat sebuah file untuk import data user dengan format seperti gambar dibawah. Pilih
                    file excel, kemudian klik import.</p>
                <figure class="space-y-2">
                    <img src="{{ url('docs/importuser1.png') }}" alt="import user 1" class="rounded-lg">
                    <ul class="text-xs list-disc list-inside">
                        <h2>Ketentuan kolom:</h2>
                        <li>telegram_id = dapatkan telegram_id dari bot telegram userinfobot.</li>
                        <li>role = pilih salahsatu role {{ implode('|', $roles) }}.</li>
                        <li>nama_site = pastikan sama dengan nama site dari data site.</li>
                    </ul>
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
                        accept=".xls,.xlsx,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel,.ods,.odf" />
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
