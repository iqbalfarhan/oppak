<div class="card max-w-lg mx-auto">
    <div class="card-body space-y-4">

        <h3 class="font-bold text-xl">BBM</h3>

        <div class="space-y-2">
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Satuan Unit</span>
                </div>
                <select class="select select-bordered">
                    <option value="liter">Liter</option>
                    <option value="cm">cm (Centimeter)</option>
                </select>
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Value BBM</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered" />
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Eviden</span>
                </div>
                <input wire:model="photo" type="file" class="file-input file-input-bordered" />
            </label>
            @if ($photo)
                <div class="avatar">
                    <div class="w-24 rounded-xl">
                        <img src="{{ $photo->temporaryUrl() }}" />
                    </div>
                </div>
            @endif
        </div>


        <div class="card-actions">
            <button class="btn btn-primary">
                <x-tabler-check class="size-5" />
                <span>Simpan</span>
            </button>
        </div>
    </div>
</div>
