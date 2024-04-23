<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Visitor Book',
    ])

    <div class="grid md:grid-cols-3 gap-3 md:gap-6">
        @livewire('widget.visitor', [
            'number' => $datas->count(),
            'title' => 'Visitor hari ini',
            'desc' => 'Tanggal ' . date('d F Y'),
        ])
        @livewire('widget.visitor', [
            'number' => $datas->where('keluar', null)->count(),
            'color' => 'warning',
            'title' => 'Visitor masuk',
            'desc' => 'Status visitor masih di dalam',
        ])
        @livewire('widget.visitor', [
            'number' => $datas->whereNotNull('keluar')->count(),
            'color' => 'success',
            'title' => 'Visitor sudah keluar',
            'desc' => 'Sudah selesai / keluar',
        ])
    </div>

    <div class="grid md:grid-cols-2 gap-3 md:gap-6">
        <div class="card">
            <div class="card-body space-y-2">
                <div class="text-lg font-semibold flex justify-between">
                    <span>Input visitor</span>
                    <x-tabler-plus class="size-5" />
                </div>
                <p class="text-sm line-clamp-2">Input tamu sebelum masuk ke site atau STO. Input nama, nomor
                    identitas, perusahaan, nomor telepon dan keperluan kunjungan.</p>
                <div class="card-actions">
                    <button class="btn btn-primary btn-sm gap-1" wire:click="$dispatch('createTamu')">
                        <x-tabler-plus class="size-4" />
                        <span>Input visitor</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body space-y-2">
                <div class="text-lg font-semibold flex justify-between">
                    <span>Riwayat visitor</span>
                    <x-tabler-list class="size-5" />
                </div>
                <p class="text-sm line-clamp-2">Lihat semua data tamu. filter data tamu dengan tanggal, nama tamu,
                    perusahaan, nomor telepon dan keperluan tamu. Klik untuk masuk riwayat tamu.</p>
                <div class="card-actions">
                    <a href="{{ route('tamu.index') }}" class="btn btn-primary btn-sm gap-1" wire:navigate>
                        <x-tabler-list class="size-4" />
                        <span>Riwayat visitor</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>STO / Site</th>
                <th>Photo kegiatan</th>
                <th>Nama Tamu</th>
                <th>Keperluan</th>
                <th class="text-center">Masuk</th>
                <th class="text-center">Keluar</th>
            </thead>
            <tbody>
                @forelse ($datas->whereNull('keluar') as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->site->name }}</td>
                        <td>
                            <div class="avatar-group -space-x-3 rtl:space-x-reverse">
                                @foreach ($data->images as $gambar)
                                    <div class="avatar"
                                        wire:click="$dispatch('showPreview', {url : '{{ $gambar }}'})">
                                        <div class="w-6">
                                            <img src="{{ Storage::url($gambar) }}" />
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('tamu.show', $data) }}" class="btn btn-xs btn-bordered" wire:navigate>
                                <span>{{ $data->nama }}</span>
                            </a>
                        </td>
                        <td>{{ Str::limit($data->keperluan, 30) }}</td>
                        <td class="text-center">{{ $data->masuk->format('H:i') }}</td>
                        <td>
                            <div class="flex gap-1 justify-center">
                                @if ($data->keluar)
                                    {{ $data->keluar->format('H:i') }}
                                @else
                                    <button class="btn btn-info btn-xs gap-1"
                                        wire:click="$dispatch('exitTamu', {tamu: {{ $data->id }}})">
                                        <x-tabler-logout class="size-4" />
                                        <span>Keluar</span>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%" class="text-center">Tidak ada tamu</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @livewire('pages.tamu.actions')
    @livewire('pages.tamu.create')
</div>
