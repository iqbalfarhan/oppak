<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-sm">
            <h3 class="font-bold text-lg">Ubah status ticket</h3>
            <p class="py-4">
                Apakah yakin untuk menutup ticket ini
            </p>
            <div class="modal-action justify-between">
                <button wire:click="closeModal" class="btn btn-ghost">Close</button>
                <button wire:click="simpan" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
