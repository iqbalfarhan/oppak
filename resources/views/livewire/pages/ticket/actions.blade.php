<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Form Ticket</h3>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Lokasi Site/STO</span>
                    </div>
                    <select class="select select-bordered" wire:model="form.site_id">
                        <option value="">Pilih site</option>
                        @foreach ($sites as $witel => $site)
                            <optgroup label="{{ $witel }}">
                                @foreach ($site as $item)
                                    <option value="{{ $item->id }}">{{ $item->label }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Perangkat</span>
                    </div>
                    <select class="select select-bordered" wire:model="form.perangkat">
                        <option value="">Pilih perangkat</option>
                        @foreach ($perangkats as $prkt)
                            <option value="{{ $prkt }}">{{ $prkt }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Uraian permasalahan</span>
                    </div>
                    <textarea placeholder="tuliskan uraian masalah" class="textarea textarea-bordered" wire:model="form.uraian"></textarea>
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Photo eviden</span>
                    </div>
                    <input type="file" placeholder="Type here" class="file-input file-input-bordered"
                        wire:model="photo" />
                </label>

                <div class="flex gap-1">
                    @isset($form->ticket->photo)
                        <div class="avatar">
                            <div class="w-32 rounded-lg">
                                <img src="{{ $form->ticket->image }}" alt="">
                            </div>
                        </div>
                    @endisset
                    @if ($photo)
                        <div class="avatar">
                            <div class="w-32 rounded-lg">
                                <img src="{{ $photo->temporaryUrl() }}" alt="">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="closeModal" class="btn btn-ghost">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
