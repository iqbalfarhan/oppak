<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-xl" wire:submit="simpan">
            <h3 class="font-bold text-lg">Upload photo</h3>
            <div class="py-6 flex flex-col gap-4">
                @if ($photo)
                    <div class="flex flex-wrap">
                        @foreach ($photo as $image)
                            <div class="avatar">
                                <div class="max-w-32 btn-bordered rounded-lg">
                                    <img src="{{ $image->temporaryUrl() }}" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <label class="form-control">
                    <input type="file" @class([
                        'file-input file-input-bordered',
                        'file-input-error' => $errors->first('photo'),
                    ]) wire:model.live="photo" accept="image/*"
                        multiple />
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
