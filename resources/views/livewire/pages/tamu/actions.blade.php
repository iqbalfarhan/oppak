<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Detail tamu</h3>
            @if ($tamu)
                <div class="py-6 grid grid-cols-2 gap-3">
                    @foreach ($tamu->toArray() as $key => $value)
                        <div class="flex flex-col">
                            <div>{{ Str::title(str_replace('_', ' ', $key)) }}</div>
                            <span class="text-xs">{{ $value ?? '-' }}</span>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="modal-action">
                <button wire:click="closeModal" class="btn btn-ghost">Close</button>
            </div>
        </div>
    </div>
</div>
