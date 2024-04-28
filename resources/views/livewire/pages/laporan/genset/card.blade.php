<div class="card card-compact card-divider">
    <div class="card-body space-y-4">
        <div class="flex flex-col md:flex-row gap-3">
            <div>
                <div class="avatar" wire:click="$dispatch('showPreview', {url: '{{ $genset->photo }}'})">
                    <div class="w-16 rounded-lg">
                        <img src="{{ $genset->gambar }}" alt="Shoes" class="h-fit" />
                    </div>
                </div>
            </div>
            <p>{{ $genset->label }}</p>
        </div>
    </div>
    @foreach ($genset->bateraistarters as $key => $bs)
        <div class="card-body space-y-1 group">
            <p class="text-xs">
                <span class="font-bold">Battery starter {{ $key + 1 }} :</span>
                tegangan {{ $bs->tegangan }} volt,
                bj_cell {{ $bs->bj_cell }},
                bj_pilot_cell {{ $bs->bj_pilot_cell }},
                elektrolit {{ $bs->elektrolit }},
                kekencangan kabel {{ $bs->kencang ? 'kencang' : 'tidak kencang' }}.
                <button class="link text-primary opacity-0 group-hover:opacity-100"
                    wire:click="$dispatch('editBateraistarter', {bateraistarter: {{ $bs->id }}})">edit</button>
                <button class="link text-primary opacity-0 group-hover:opacity-100"
                    wire:click="$dispatch('deleteBateraistarter', {bateraistarter: {{ $bs->id }}})">delete</button>
            </p>
        </div>
    @endforeach
    <div class="card-body space-y-4 bg-base-200/50">
        <div class="card-actions justify-between">
            <button class="btn btn-bordered btn-sm gap-1"
                wire:click="$dispatch('createBateraistarter', {genset : {{ $genset->id }}})">
                <x-tabler-plus class="size-4" />
                <span>Baterai starter</span>
            </button>
            <div class="flex gap-1">
                <button class="btn btn-sm btn-bordered gap-1 btn-square"
                    wire:click="$dispatch('editGenset', {genset:{{ $genset->id }}})">
                    <x-tabler-edit class="size-4" />
                </button>
                <button class="btn btn-sm btn-bordered gap-1 btn-square"
                    wire:click="$dispatch('deleteGenset', {genset:{{ $genset->id }}})">
                    <x-tabler-trash class="size-4" />
                </button>
            </div>
        </div>
    </div>
</div>
