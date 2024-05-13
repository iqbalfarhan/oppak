<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Detail ticket ' . Str::upper($ticket->kode),
    ])

    @if ($ticket->done)
        <div class="card card-compact bg-success text-success-content">
            <div class="card-body">
                <div class="flex items-center gap-3">
                    <x-tabler-circle-check />
                    <span>Status ticket sudah selesai dikerjakan</span>
                </div>
            </div>
        </div>
    @endif

    <div class="table-wrapper">
        <table class="table table-top">
            <tr>
                <td>Kode ticket</td>
                <td>:</td>
                <td>{{ Str::upper($ticket->kode) }}</td>
            </tr>
            <tr>
                <td>Pembuat</td>
                <td>:</td>
                <td>{{ $ticket->user->name }}</td>
            </tr>
            <tr>
                <td>Site / STO</td>
                <td>:</td>
                <td>{{ $ticket->site->label }}</td>
            </tr>
            <tr>
                <td>Progress</td>
                <td>:</td>
                <td>{{ $ticket->progress }}%</td>
            </tr>
            <tr>
                <td>Perangkat</td>
                <td>:</td>
                <td>{{ $ticket->perangkat }}</td>
            </tr>
            <tr>
                <td>Uraian</td>
                <td>:</td>
                <td>{{ $ticket->uraian }}</td>
            </tr>
            <tr>
                <td>Status pengajuan</td>
                <td>:</td>
                <td>{{ $ticket->pengajuan ? 'Sudah diajukan' : 'Belum diajukan' }}</td>
            </tr>
            @if ($ticket->photo)
                <tr>
                    <td>Photo</td>
                    <td>:</td>
                    <td>
                        <div class="avatar" wire:click="$dispatch('showPreview', {url:'{{ $ticket->photo }}'})">
                            <div class="w-24 rounded-lg">
                                <img src="{{ $ticket->image }}" alt="">
                            </div>
                        </div>
                    </td>
                </tr>
            @endif
        </table>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        <div class="space-y-6">
            <div class="card card-divider">
                <div class="card-body space-y-2">
                    <h3 class="font-bold text-lg">Progress ticket ({{ Number::percentage($ticket->progress) }})</h3>
                    @can('ticket.setprogress')
                        <input type="range" min="0" max="100" value="{{ $ticket->progress }}"
                            wire:model.live="progress" @class([
                                'range range-sm',
                                'range-primary' => !$ticket->done,
                                'range-primary' => !$ticket->pengajuan,
                            ]) @disabled($ticket->done || $ticket->pengajuan) />
                    @endcan
                </div>
                @if ($ticket->done)
                    @can('ticket.setdone')
                        <div class="card-body space-y-2">
                            <h3 class="font-bold text-lg">Buka kembali ticket</h3>
                            <p class="text-sm">Ini akan mengirim pengajuan close ticket kepembuat ticket
                                ({{ $ticket->user->name }}).
                            </p>
                            <div class="card-actions">
                                <button class="btn btn-error btn-block" wire:click="toggleDone"
                                    wire:confirm="Status ticket saat ini sudah selesai. apakah anda yakin untuk membuka kembali ticket?">
                                    <x-tabler-arrow-back-up class="size-5" />
                                    <span>Kembalikan ke draft</span>
                                </button>
                            </div>
                        </div>
                    @endcan
                @elseif ($ticket->pengajuan)
                    @can('ticket.requestclose')
                        <div class="card-body space-y-2">
                            <h3 class="font-bold">Pengajuan sudah dikirim</h3>
                            <p class="text-sm">Ini akan mengirim pengajuan close ticket kepembuat ticket
                                ({{ $ticket->user->name }}).
                            </p>
                            <div class="card-actions">
                                <button class="btn btn-info btn-block" wire:click="togglePengajuan"
                                    wire:confirm="Pengajuan close ticket sedang berlangsung. apa anda yakin untuk membatalkan pengajuan?">
                                    <x-tabler-arrow-back-up class="size-5" />
                                    <span>Batalkan pengajuan</span>
                                </button>
                            </div>
                        </div>
                    @endcan
                @elseif ($progress == 100)
                    @can('ticket.requestclose')
                        <div class="card-body space-y-2">
                            <h3 class="font-bold">Pengajuan close ticket</h3>
                            <p class="text-sm">Ini akan mengirim pengajuan close ticket kepembuat ticket
                                ({{ $ticket->user->name }}).
                            </p>
                            <div class="card-actions">
                                <button class="btn btn-primary btn-block" wire:click="togglePengajuan">
                                    <x-tabler-arrow-right class="size-5" />
                                    <span>Ajukan close ticket</span>
                                </button>
                            </div>
                        </div>
                    @endcan
                @else
                    <div class="card-body py-4">
                        <p class="text-xs opacity-75">Bisa mengajukan close ticket jika progress sudah 100%.</p>
                    </div>
                @endif

                @if ($ticket->done == false && $ticket->pengajuan)
                    @can('ticket.setdone')
                        <div class="card-body space-y-2">
                            <h3 class="font-bold text-lg">Close ticket</h3>
                            <p class="text-sm">Tandai bahwa ticket ini sudah selesai dikerjakan dan tidak ada kendala lagi
                            </p>
                            <div class="card-actions">
                                <button class="btn btn-warning btn-block" wire:click="toggleDone">
                                    <x-tabler-check class="size-5" />
                                    <span>Close ticket</span>
                                </button>
                            </div>
                        </div>
                    @endcan
                @endif
            </div>
        </div>
        <div class="md:col-span-2">
            @livewire('pages.ticket.chat', ['ticket' => $ticket])
        </div>
    </div>
</div>
