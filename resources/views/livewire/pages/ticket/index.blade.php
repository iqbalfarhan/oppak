<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'Ticketing'])

    <div class="grid md:grid-cols-3 gap-2 md:gap-6" wire:poll>
        <div wire:click="setDone">
            @livewire('widget.ticket', [
                'number' => $datas->where('done', false)->count(),
                'title' => 'Ticket belum selesai',
                'desc' => 'Jumlah ticket belum selesai',
            ])
        </div>
        <div wire:click="setPengajuan(1)">
            @livewire('widget.ticket', [
                'color' => 'warning',
                'number' => $datas->where('pengajuan')->count(),
                'title' => 'Request close',
                'desc' => 'Jumlah ticket yang belum selesai',
            ])
        </div>
        <div wire:click="setDone(1)">
            @livewire('widget.ticket', [
                'color' => 'success',
                'number' => $datas->where('done')->count(),
                'title' => 'Ticket selesai ',
                'desc' => 'Jumlah ticket selesai',
            ])
        </div>
    </div>

    <div class="flex flex-col md:flex-row gap-2 justify-between">
        <input type="search" class="input input-bordered" placeholder="Pencarian" wire:model.lazy="search" />
        @can('ticket.create')
            <button class="btn btn-primary" wire:click="$dispatch('createTicket')">
                <x-tabler-plus class="size-5" />
                <span>Buat ticket</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Kode ticket</th>
                <th>Pembuat ticket</th>
                <th>Progress</th>
                <th>Uraian</th>
                <th class="text-center">Log</th>
                @canany(['ticket.edit', 'ticket.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @forelse ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>
                            <a href="{{ route('ticket.show', $data) }}" @class([
                                'btn btn-xs uppercase',
                                'btn-success' => $data->done,
                                'btn-bordered' => !$data->done,
                                'btn-warning border-0' => $data->pengajuan,
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
                                    <div class="text-xs opacity-75">{{ $data->site->label }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ Number::percentage($data->progress) }}</td>
                        <td class="whitespace-normal min-w-52 max-w-80">
                            <div class="flex flex-col items-start">
                                <div>{{ $data->perangkat }}</div>
                                <div class="text-xs opacity-75 line-clamp-1">{{ $data->uraian }}</div>
                            </div>
                        </td>
                        <td>
                            <div class="flex justify-center">
                                <a href="{{ route('ticket.log', $data) }}" class="btn btn-xs btn-ghost" wire:navigate>
                                    {{ $data->logtickets_count }}
                                    <x-tabler-message-chatbot class="size-5" />
                                </a>
                            </div>
                        </td>
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
                @empty
                    <tr>
                        <td colspan="100%">@livewire('partial.nocontent')</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @livewire('pages.ticket.actions')
    @livewire('pages.ticket.set-done')
</div>
