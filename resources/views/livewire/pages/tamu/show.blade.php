<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Detail tamu',
    ])

    <div class="card divide-y-2 divide-base-300">
        <div class="card-body py-5 bg-base-200/50">
            <div class="card-actions justify-between items-center">
                <h3 class="text-lg font-bold">{{ $tamu->nama }}</h3>
                <button class="btn btn-success">
                    <x-tabler-edit class="size-5" />
                    <span>Edit tamu</span>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="grid md:grid-cols-3 gap-4">
                <div class="flex flex-col">
                    <div class="text-xs opacity-50">Site / STO</div>
                    <span>{{ $tamu->site->witel }} : {{ $tamu->site->name }}</span>
                </div>
                @foreach (['nama', 'perusahaan', 'keperluan', 'tipe_identitas', 'nomor_identitas', 'notelp', 'masuk', 'keluar'] as $item)
                    <div class="flex flex-col">
                        <div class="text-xs opacity-50">{{ Str::title(str_replace('_', ' ', $item)) }}</div>
                        <span>{{ $tamu->$item ?? '-' }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card divide-y-2 divide-base-300">
        <div class="card-body py-5 bg-base-200/50">
            <div class="card-actions justify-between items-center">
                <h3 class="text-lg font-bold">Photo kegiatan dan dokumen tamu</h3>
                <button class="btn btn-primary">
                    <x-tabler-camera class="size-5" />
                    <span>Tambah photo</span>
                </button>
            </div>
        </div>
        <div class="card-body space-y-4">
            <div class="flex flex-wrap gap-4">
                Belum ada photo
            </div>
        </div>
    </div>

    @if ($tamu->keluar == null)
        <div class="card divide-y-2 divide-base-300">
            <div class="card-body py-5 bg-base-200/50">
                <div class="card-actions justify-between items-center">
                    <h3 class="text-lg font-bold">Tamu sudah keluar dari Site / STO</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="card-actions">
                    <button class="btn btn-primary" wire:click="$dispatch('exitTamu', {tamu: {{ $tamu->id }}})">
                        <x-tabler-logout class="size-5" />
                        <span>Tamu sudah keluar</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    @livewire('pages.tamu.actions')
</div>
