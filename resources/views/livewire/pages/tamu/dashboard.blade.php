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
            <div class="card-body">
                <div class="text-lg font-semibold flex justify-between">
                    <span>Input visitor</span>
                    <x-tabler-plus class="size-5" />
                </div>
                <p class="py-2 text-sm">Input tamu sebelum masuk ke site atau STO. Input nama, nomor
                    identitas, perusahaan, nomor telepon dan keperluan kunjungan.</p>
                <div class="card-actions">
                    <a href="{{ route('tamu.create') }}" class="btn btn-primary" wire:navigate>
                        <x-tabler-plus class="size-5" />
                        <span>Input visitor</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="text-lg font-semibold flex justify-between">
                    <span>Riwayat visitor</span>
                    <x-tabler-list class="size-5" />
                </div>
                <p class="py-2 text-sm">Lihat semua data tamu. filter data tamu dengan tanggal, nama tamu,
                    perusahaan, nomor telepon dan keperluan tamu. Klik untuk masuk riwayat tamu.</p>
                <div class="card-actions">
                    <a href="{{ route('tamu.index') }}" class="btn btn-primary">
                        <x-tabler-list class="size-5" />
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
                            <div class="flex gap-2 items-center">
                                <div class="avatar placeholder">
                                    <div class="w-6 rounded-full bg-base-200 btn-bordered">
                                        <span class="text-xs">{{ $data->nama[0] }}</span>
                                    </div>
                                </div>
                                <span>{{ Str::limit($data->nama, 20) }}</span>
                            </div>
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
</div>
