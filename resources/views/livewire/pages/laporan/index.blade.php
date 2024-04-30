<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Laporan rutin',
    ])

    <div class="flex flex-col md:flex-row justify-between gap-2">
        <input type="date" class="input input-bordered">
        <button class="btn btn-primary" wire:click="$dispatch('createLaporan')">
            <x-tabler-plus class="size-5" />
            <span>Buat laporan rutin</span>
        </button>
    </div>

    <div class="table-wrapper">
        @if ($datas->hasPages())
            <div class="p-3 border-b-2 border-base-300">
                {{ $datas->links() }}
            </div>
        @endif
        <table class="table">
            <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pelapor</th>
                <th>Site</th>
                <th>status</th>
                <th class="text-center">Actions</th>
            </thead>
            <tbody>
                @forelse ($datas as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->tanggal->format('d F Y') }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->site->label }}</td>
                        <td>
                            <badge @class([
                                'badge badge-sm',
                                'badge-success' => $data->done,
                                'badge-warning' => !$data->done,
                            ])>{{ $data->done ? 'Done' : 'Draft' }}</badge>
                        </td>
                        <td>
                            <div class="flex gap-1 justify-center">
                                <a href="{{ route('laporan.show', $data) }}" class="btn btn-xs btn-square btn-bordered"
                                    wire:navigate>
                                    <x-tabler-edit class="size-4" />
                                </a>
                                <button class="btn btn-xs btn-square btn-bordered"
                                    wire:click="$dispatch('deleteLaporan', {laporan: {{ $data->id }}})">
                                    <x-tabler-trash class="size-4" />
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">Belum ada laporan </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @livewire('pages.laporan.actions')
</div>
