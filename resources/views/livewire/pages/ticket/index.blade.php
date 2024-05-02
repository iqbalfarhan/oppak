<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'Ticketing'])

    <div class="grid grid-cols-3 gap-6">
        @livewire('widget.ticket', [
            'number' => $datas->where('done', false)->count(),
            'title' => 'Ticket belum selesai',
            'desc' => 'Jumlah ticket belum selesai',
        ])
        @livewire('widget.ticket', [
            'color' => 'warning',
            'number' => $datas->where('pengajuan')->count(),
            'title' => 'Request close',
            'desc' => 'Jumlah ticket yang belum selesai',
        ])
        @livewire('widget.ticket', [
            'color' => 'success',
            'number' => $datas->where('done')->count(),
            'title' => 'Ticket selesai ',
            'desc' => 'Jumlah ticket selesai',
        ])
    </div>

    <div class="flex flex-col md:flex-row gap-2 justify-between">
        <input type="text" class="input input-bordered" placeholder="Pencarian" />
        <button class="btn btn-primary" wire:click="$dispatch('createTicket')">
            <x-tabler-plus class="size-5" />
            <span>Buat ticket</span>
        </button>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Kode ticket</th>
                <th>Pembuat ticket</th>
                <th>Percentage</th>
                <th>Uraian</th>
                <th>Log</th>
                @canany(['ticket.edit', 'ticket.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>
                            <a href="{{ route('ticket.show', $data) }}" @class([
                                'btn btn-xs uppercase',
                                'btn-success' => $data->done,
                                'btn-bordered' => !$data->done,
                            ])>
                                {{ $data->kode }}
                            </a>
                        </td>
                        <td>
                            <div class="flex gap-3 items-center">
                                <div class="avatar">
                                    <div class="w-8 bg-base-300 rounded-lg">
                                        <img src="{{ $data->image }}" alt="">
                                    </div>
                                </div>
                                <div class="flex flex-col items-start">
                                    <div>{{ $data->user->name }}</div>
                                    <div class="text-xs opacity-75">({{ $data->site->label }})</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ Number::percentage($data->progress) }}</td>
                        <td class="whitespace-normal min-w-52 max-w-80">{{ $data->uraian }}</td>
                        <td>{{ $data->logtickets_count }}</td>
                        @canany(['ticket.edit', 'ticket.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('ticket.setdone')
                                        @if ($data->pengajuan)
                                            <button class="btn btn-warning btn-xs btn-square"
                                                wire:click="$dispatch('setDone', {ticket: {{ $data->id }}})">
                                                <x-tabler-exclamation-circle class="size-4" />
                                            </button>
                                        @endif
                                    @endcan
                                    @can('ticket.edit')
                                        <button class="btn btn-bordered btn-xs btn-square"
                                            wire:click="$dispatch('editTicket', {ticket: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('ticket.delete')
                                        <button class="btn btn-bordered btn-xs btn-square"
                                            wire:click="$dispatch('deleteTicket', {ticket: {{ $data->id }}})">
                                            <x-tabler-trash class="size-4" />
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        @endcanany
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        <div class="flex items-center gap-2">
            <button class="btn btn-warning btn-xs btn-square">
                <x-tabler-exclamation-circle class="size-4" />
            </button>
            <span class="text-xs">Klik action ini untuk close ticket.</span>
        </div>
    </div>

    @livewire('pages.ticket.actions')
    @livewire('pages.ticket.set-done')
</div>
