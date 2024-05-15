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
                @else
                    <p class="text-sm">Silakan pilih photo sebagai eviden pekerjaan tamu. bisa upload lebih dari 1
                        gambar.</p>
                @endif
                <label class="form-control">
                    <label for="" class="label">
                        <div class="label-text">Ambil photo dari gallery</div>
                    </label>
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

            <button type="button" class="btn btn-primary" onclick="document.getElementById('camera').click()">
                <x-tabler-camera class="size-5" />
                <span>Buka camera</span>
            </button>

            <input type="file" id="camera" wire:model.live="photo" class="hidden" capture="environment" />

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
