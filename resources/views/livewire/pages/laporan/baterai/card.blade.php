<div class="card card-compact card-divider">
    <div class="card-body">
        <div class="flex flex-col md:flex-row gap-3">
            <div>
                <div class="avatar" wire:click="$dispatch('showPreview', {url: '{{ $baterai->photo }}'})">
                    <div class="w-24 rounded-lg">
                        <img src="{{ $baterai->image }}" alt="">
                    </div>
                </div>
            </div>
            <table class="w-full">
                @foreach ($baterai->tegangan as $key => $tegangan)
                    <tr>
                        <td>tegangan total bank {{ $key + 1 }}</td>
                        <td>:</td>
                        <td>{{ $tegangan }} volt</td>
                    </tr>
                @endforeach

                <tr @class(['text-error' => $baterai->elektrolit != 'normal'])>
                    <td>Elektrolit</td>
                    <td>:</td>
                    <td>{{ $baterai->elektrolit }}</td>
                </tr>

                <tr>
                    <td>BJ Cell</td>
                    <td>:</td>
                    <td>{{ $baterai->bj_cell }} volt</td>
                </tr>

                @foreach ($baterai->bj_pilot_cell_bank as $key => $pilot)
                    <tr>
                        <td>BJ Pilot cell bank {{ $key + 1 }}</td>
                        <td>:</td>
                        <td>{{ $pilot }} volt</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="card-body bg-base-200/50">
        <div class="card-actions justify-between">
            <div></div>
            <div class="flex flex-row gap-1">
                <button class="btn btn-sm btn-square btn-bordered"
                    wire:click="$dispatch('editBaterai', {baterai: {{ $baterai }}})">
                    <x-tabler-edit class="size-4" />
                </button>
                <button class="btn btn-sm btn-square btn-bordered"
                    wire:click="$dispatch('deleteBaterai', {baterai: {{ $baterai }}})">
                    <x-tabler-trash class="size-4" />
                </button>
            </div>
        </div>
    </div>
</div>
