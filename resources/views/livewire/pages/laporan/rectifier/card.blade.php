<div class="card card-compact card-divider">
    <div class="card-body">
        <div class="flex flex-col md:flex-row gap-3">
            <div>
                <div class="avatar" wire:click="$dispatch('showPreview', {url: '{{ $rectifier->photo }}'})">
                    <div class="w-24 rounded-lg btn-bordered">
                        <img src="{{ $rectifier->image }}" alt="">
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="text-lg font-semibold">{{ $rectifier->keterangan }}</div>
                <p>{{ $rectifier->label }}</p>
            </div>
        </div>
    </div>
    <div class="card-body bg-base-200/50">
        <div class="card-actions justify-between">
            <div></div>
            <div class="flex flex-row gap-1">
                <button class="btn btn-sm btn-square btn-bordered"
                    wire:click="$dispatch('editRectifier', {rectifier: {{ $rectifier }}})">
                    <x-tabler-edit class="size-4" />
                </button>
                <button class="btn btn-sm btn-square btn-bordered"
                    wire:click="$dispatch('deleteRectifier', {rectifier: {{ $rectifier }}})">
                    <x-tabler-trash class="size-4" />
                </button>
            </div>
        </div>
    </div>
</div>
