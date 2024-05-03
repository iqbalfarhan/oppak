<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Detail tamu',
    ])

    <div class="card card-divider">
        <div class="card-body py-5 bg-base-200/50">
            <div class="card-actions justify-between items-center">
                <h3 class="text-lg font-bold">{{ $tamu->nama }}</h3>
                <button class="btn btn-success" wire:click="$dispatch('editTamu', {tamu: {{ $tamu->id }}})">
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

    <div class="card card-divider">
        <div class="card-body py-5 bg-base-200/50">
            <div class="card-actions justify-between items-center">
                <h3 class="text-lg font-bold">Photo kegiatan dan dokumen tamu</h3>
                <button class="btn btn-primary" wire:click="$dispatch('addPhoto', {tamu: {{ $tamu->id }}})">
                    <x-tabler-camera class="size-5" />
                    <span>Tambah photo</span>
                </button>
            </div>
        </div>
        <div class="card-body space-y-4">
            <div class="flex flex-wrap gap-2">
                @forelse ($tamu->images as $item)
                    <div class="avatar" wire:click="$dispatch('showPreview', {url : '{{ $item }}'})">
                        <div class="w-24 rounded-xl btn-bordered">
                            <img src="{{ Storage::url($item) }}" />
                        </div>
                    </div>
                @empty
                    Belum ada photo
                @endforelse
            </div>
        </div>
    </div>

    @if ($tamu->keluar == null)
        <div class="card card-divider">
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
    @livewire('pages.tamu.create')
    @livewire('pages.tamu.add-photo')
</div>
