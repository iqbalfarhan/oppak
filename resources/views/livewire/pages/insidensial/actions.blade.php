<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <h3 class="font-bold text-lg">Laporan insidensial</h3>
            <div class="py-4 space-y-2">
                <div class="flex justify-center">
                    <div class="avatar">
                        <div class="w-48 rounded-lg btn-bordered">
                            <img src="{{ $photo ? $photo->temporaryUrl() : $oldPhoto ?? url('noimage.png') }}" />
                        </div>
                    </div>
                </div>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Photo laporan</span>
                    </div>
                    <input type="file" placeholder="Type here" class="file-input file-input-bordered"
                        wire:model="photo" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Kategori laporan</span>
                    </div>
                    <input type="text" placeholder="Kategori laporan" class="input input-bordered"
                        wire:model="form.kategori" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Uraian laporan</span>
                    </div>
                    <textarea type="text" placeholder="Uraian laporan" class="textarea textarea-bordered" wire:model="form.uraian"></textarea>
                </label>
            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="closeModal" class="btn btn-ghost">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
