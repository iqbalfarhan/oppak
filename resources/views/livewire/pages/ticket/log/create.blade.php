<form class="card-actions" wire:submit="tambahLog">
    @if ($photo)
        <div class="avatar">
            <div class="w-24 rounded">
                <img src="{{ $photo->temporaryUrl() }}" />
            </div>
        </div>
    @endif
    <div class="flex w-full gap-2">
        <label class="input input-bordered flex items-center gap-2 w-full">
            <input type="text" class="grow" placeholder="Tulis log" wire:model="uraian" />
            <x-tabler-paperclip class="size-5" onclick="document.getElementById('addEviden').click()" />
        </label>
        <input type="file" class="hidden" id="addEviden" wire:model="photo">
        <button class="btn btn-primary">
            <x-tabler-arrow-right class="size-5" />
            <span>Kirim</span>
        </button>
    </div>
</form>
