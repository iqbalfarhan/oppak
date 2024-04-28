<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <h3 class="font-bold text-lg">Upload photo</h3>
            <div class="py-6 flex flex-col items-center gap-4">
                <div class="avatar">
                    <div class="max-w-48 btn-bordered rounded-lg">
                        <img src="{{ $photo ? $photo->temporaryUrl() : url('nouser.jpg') }}" />
                    </div>
                </div>
                <label class="form-control w-full max-w-xs">
                    <input type="file" @class([
                        'file-input file-input-bordered w-full',
                        'file-input-error' => $errors->first('photo'),
                    ]) wire:model.live="photo" />
                    @error('photo')
                        <div class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                    @enderror
                </label>
            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="closeModal" class="btn btn-ghost">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-upload class="size-5" />
                    <span>Upload</span>
                </button>
            </div>
        </form>
    </div>
</div>
