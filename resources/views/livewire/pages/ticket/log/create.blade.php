<form wire:submit="tambahLog" class="flex gap-2 flex-row justify-between items-center">
    <label @class([
        'input input-bordered flex items-center gap-2 w-full',
        'input-error' => $errors->first('uraian'),
    ])>
        <input type="text" class="grow w-full" placeholder="Tulis log" wire:model="uraian" />
        <button @class([
            'btn btn-sm btn-circle avatar btn-bordered',
            'placeholder' => !isset($photo),
        ]) type="button" onclick="document.getElementById('addEviden').click()">
            <div class="w-10 rounded-full">
                @if ($photo)
                    <img src="{{ $photo->temporaryUrl() }}" />
                @else
                    <x-tabler-photo class="size-4" />
                @endif
            </div>
        </button>
        <input type="file" class="hidden" id="addEviden" wire:model="photo">
    </label>
    <button class="btn btn-primary btn-circle">
        <x-tabler-arrow-right class="size-5" />
    </button>
</form>
