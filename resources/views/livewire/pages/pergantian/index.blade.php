<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Pergantian rutin',
    ])

    <div class="flex flex-col md:flex-row gap-1">
        <select type="text" class="select select-bordered" placeholder="Pencarian" wire:model.live="witel">
            <option value="">PILIH WITEL</option>
            @foreach ($witels as $wtl)
                <option value="{{ $wtl }}">{{ $wtl }}</option>
            @endforeach
        </select>
        <div class="flex-1"></div>
        @can('perangkat.index')
            <button class="btn btn-primary" wire:click="$dispatch('showPerangkat')">
                <x-tabler-list class="size-5" />
                <span>List perangkat</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table vertical-header-table">
            <thead>
                <th>No</th>
                <th class="w-full">Witel - Site</th>
                @foreach ($perangkats as $prkt)
                    <th class="text-center"><span>{{ $prkt->name }}</span></th>
                @endforeach
            </thead>
            <tbody>
                @forelse ($sites as $site)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $site->label }}</td>
                        @foreach ($perangkats as $perangkat)
                            @php
                                $count = $site->pergantians?->where('perangkat_id', $perangkat->id)->count();
                            @endphp
                            <td>
                                <button @class([
                                    'btn btn-xs',
                                    'btn-bordered' => $count,
                                    'btn-ghost' => $count == 0,
                                ])
                                    wire:click="dispatch('showPergantian', {site: {{ $site->id }}, perangkat: {{ $perangkat->id }}})">
                                    <span @class(['opacity-20' => $count == 0])>{{ $count }}</span>
                                </button>
                            </td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">@livewire('partial.nocontent')</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @livewire('pages.perangkat.index')
    @livewire('pages.pergantian.show')
    @livewire('pages.pergantian.actions')
</div>
