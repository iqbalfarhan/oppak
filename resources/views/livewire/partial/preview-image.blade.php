<div>
    <input type="checkbox" class="modal-toggle" @checked($url ? true : false) />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-3xl p-0">
            <img class="w-full" src="{{ Storage::url($url) }}" alt="{{ $url }}">
        </div>
        <button class="modal-backdrop" wire:click="closeModal">Close</button>
    </div>
</div>
