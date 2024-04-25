<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="setTanggal">
            <h3 class="font-bold text-lg">Filter tanggal</h3>
            <div class="py-4 space-y-3">
                <div class="form-control">
                    <label class="label cursor-pointer justify-start gap-3">
                        <input type="checkbox" class="checkbox" wire:model.live="isRange" />
                        <span class="label-text">Filter range tanggal</span>
                    </label>
                </div>
                @if ($isRange)
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Dari tanggal:</span>
                        </div>
                        <input type="date" @class([
                            'input input-bordered w-full',
                            'input-error' => $errors->first('range.0'),
                        ]) wire:model="range.0" />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Sampai tanggal:</span>
                        </div>
                        <input type="date" @class([
                            'input input-bordered w-full',
                            'input-error' => $errors->first('range.1'),
                        ]) wire:model="range.1" />
                    </label>
                @else
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Pilih tanggal:</span>
                        </div>
                        <input type="date" placeholder="Type here" wire:model="tanggal"
                            @class([
                                'input input-bordered w-full',
                                'input-error' => $errors->first('tanggal'),
                            ]) />
                    </label>
                @endif

            </div>
            <div class="modal-action justify-between">
                <button type="button" class="btn btn-ghost" wire:click="closeModal">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Terapkan</span>
                </button>
            </div>
        </form>
    </div>
</div>
