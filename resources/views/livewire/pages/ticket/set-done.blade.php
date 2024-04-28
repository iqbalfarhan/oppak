<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal card-divider" role="dialog">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Tutup ticket ini</h3>
            <p class="py-4">
                User meminta ticket ini untuk ditutup. pastikan anda telah memeriksa log ticket ini sebelum menutup
                ticket ini.
            </p>
            <div class="modal-actions">
                @if ($ticket)
                    <a href="{{ route('ticket.show', $ticket) }}" class="btn btn-bordered" wire:navigate>
                        <x-tabler-list class="size-5" />
                        <span>lihat detail ticket</span>
                    </a>
                @endif
            </div>

            <div class="modal-action justify-between">
                <button wire:click="closeModal" class="btn btn-ghost">Close</button>
                <button wire:click="simpan" class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Close ticket</span>
                </button>
            </div>
        </div>
    </div>
</div>
