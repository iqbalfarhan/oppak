<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'Ticketing'])

    <div class="grid grid-cols-2 gap-6">
        @livewire('widget.ticket', [
            'color' => 'success',
            'title' => 'Ticket selesai ',
            'desc' => 'Jumlah ticket yang selesai dikerjakan',
        ])
        @livewire('widget.ticket', [
            'title' => 'Ticket belum ',
            'desc' => 'Jumlah ticket yang belum selesai',
        ])
    </div>

    <div class="flex flex-col md:flex-row gap-2 justify-between">
        <input type="text" class="input input-bordered" placeholder="Pencarian" />
        <button class="btn btn-primary">
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
                <th>Site / STO</th>
                <th>Percentage</th>
                <th>Log</th>
                <th class="text-center">Actions</th>
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
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->site->witel }} : {{ $data->site->name }}</td>
                        <td>{{ Number::percentage($data->progress) }}</td>
                        <td>{{ $data->logtickets_count }}</td>
                        <td>
                            <div class="flex gap-1 justify-center">
                                @if ($data->pengajuan)
                                    <button class="btn btn-warning btn-xs btn-square"
                                        wire:click="$dispatch('setDone', {ticket: {{ $data->id }}})">
                                        <x-tabler-exclamation-circle class="size-4" />
                                    </button>
                                @endif
                                <button class="btn btn-bordered btn-xs btn-square"
                                    wire:click="$dispatch('deleteTicket', {ticket: {{ $data->id }}})">
                                    <x-tabler-trash class="size-4" />
                                </button>
                            </div>
                        </td>
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
