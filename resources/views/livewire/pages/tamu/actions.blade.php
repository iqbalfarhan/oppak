<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Detail tamu</h3>
            @if ($tamu)
                <div class="py-6 grid md:grid-cols-2 gap-3">
                    @foreach ($tamu->toArray() as $key => $value)
                        <div class="flex flex-col">
                            <div class="text-xs opacity-50">{{ Str::title(str_replace('_', ' ', $key)) }}</div>
                            <span>{{ $value ?? '-' }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="modal-action justify-between">
                    <button wire:click="closeModal" class="btn btn-ghost">Close</button>
                    <a href="{{ route('tamu.show', $tamu) }}" class="btn btn-primary" wire:navigate>
                        <x-tabler-list class="size-5" />
                        <span>Detail tamu</span>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
