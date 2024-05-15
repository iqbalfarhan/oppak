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
            <div class="flex flex-col gap-2 flex-1">
                <div class="flex flex-col px-2">
                    <div class="text-xs opacity-50">Keterangan rectifier</div>
                    <div>{{ $rectifier->keterangan }}</div>
                </div>
                <div class="table-wrapper">
                    <table class="table table-xs">
                        <tr>
                            <td>Catuan input</td>
                            <td>{{ $rectifier->catuan_input }}</td>
                        </tr>
                        <tr @class(['text-error' => !$rectifier->is_valid['tegangan_output']])>
                            <td>Tegangan output</td>
                            <td>{{ $rectifier->tegangan_output }} Volt</td>
                        </tr>
                        <tr @class(['text-error' => !$rectifier->is_valid['arus_output']])>
                            <td>Arus output</td>
                            <td>{{ $rectifier->arus_output }} Ampere</td>
                        </tr>
                    </table>
                </div>
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
