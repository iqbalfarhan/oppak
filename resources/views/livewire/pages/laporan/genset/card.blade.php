<div class="card card-compact divide-y-2 divide-base-300">
    <figure class="avatar">
        <img src="{{ $genset->gambar }}" alt="Shoes" class="h-fit" />
    </figure>
    <div class="card-body space-y-4">
        <p>{{ $genset->label }}</p>
        <div class="card-actions justify-between">
            <button class="btn btn-sm btn-bordered gap-1"
                wire:click="$dispatch('editGenset', {genset:{{ $genset->id }}})">
                <x-tabler-edit class="size-4" />
                <span>Edit</span>
            </button>
            <button class="btn btn-sm btn-bordered gap-1"
                wire:click="$dispatch('deleteGenset', {genset:{{ $genset->id }}})">
                <x-tabler-trash class="size-4" />
                <span>Delete</span>
            </button>
        </div>
    </div>
</div>
