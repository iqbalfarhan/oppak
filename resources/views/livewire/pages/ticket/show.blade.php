<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Detail ticket ' . Str::upper($ticket->kode),
    ])

    @if ($ticket->done)
        <div class="card card-compact bg-success">
            <div class="card-body">
                <div class="flex items-center gap-3">
                    <x-tabler-circle-check />
                    <span>Status ticket sudah selesai dikerjakan</span>
                </div>
            </div>
        </div>
    @endif

    <div class="table-wrapper">
        <table class="table">
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
                        <div class="avatar">
                            <div class="w-32 rounded-lg">
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
                    <input type="range" min="0" max="100" value="{{ $ticket->progress }}"
                        wire:model.live="progress" @class([
                            'range range-sm',
                            'range-primary' => !$ticket->done,
                            'range-primary' => !$ticket->pengajuan,
                        ]) @disabled($ticket->done || $ticket->pengajuan) />
                </div>
                @if ($ticket->done)
                    <div class="card-body space-y-2">
                        <h3 class="font-bold text-lg">Kembalikan status ke Draft</h3>
                        <p class="text-sm">Ini akan mengirim pengajuan close ticket kepembuat ticket
                            ({{ $ticket->user->name }}).
                        </p>
                        <div class="card-actions">
                            <button class="btn btn-error btn-block" wire:click="backToDraft">
                                <x-tabler-arrow-back-up class="size-5" />
                                <span>Kembalikan ke draft</span>
                            </button>
                        </div>
                    </div>
                @else
                    @if ($ticket->pengajuan)
                        <div class="card-body space-y-2">
                            <h3 class="font-bold">Pengajuan sudah dikirim</h3>
                            <p class="text-sm">Ini akan mengirim pengajuan close ticket kepembuat ticket
                                ({{ $ticket->user->name }}).
                            </p>
                            <div class="card-actions">
                                <button class="btn btn-info btn-block" wire:click="togglePengajuan">
                                    <x-tabler-arrow-back-up class="size-5" />
                                    <span>Batalkan pengajuan</span>
                                </button>
                            </div>
                        </div>
                    @elseif ($progress == 100)
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
                    @else
                        <div class="card-body py-4">
                            <p class="text-xs opacity-75">Bisa mengajukan close ticket jika progress sudah 100%.</p>
                        </div>
                    @endif
                @endif
            </div>

        </div>
        <div class="md:col-span-2">
            <div class="card card-divider">
                <div class="card-body">
                    <h3 class="font-bold">Log progress ticket</h3>
                    <div class="py-4 space-y-2">
                        @forelse ($ticket->logtickets as $log)
                            <div @class([
                                'chat',
                                'chat-start' => !$log->is_me,
                                'chat-end' => $log->is_me,
                            ])>
                                <div @class(['chat-image avatar tooltip tooltip-sm tooltip-success']) data-tip="{{ Str::limit($log->user->name, 10) }}">
                                    <div class="w-10 rounded-full bg-base-300">
                                        <img src="{{ $log->user->image }}" alt="">
                                    </div>
                                </div>
                                {{-- <div class="chat-header">
                                    {{ $log->user->name }}
                                    <time class="text-xs opacity-50">{{ $log->created_at->diffForHumans() }}</time>
                                </div> --}}
                                <div class="chat-bubble flex flex-col gap-2">
                                    @if ($log->photo)
                                        <img src="{{ $log->image }}"
                                            wire:click="$dispatch('showPreview', {url:'{{ $log->photo }}'})"
                                            class="rounded-lg max-w-40 max-h-40" />
                                    @endif
                                    <span>{{ $log->uraian }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="flex justify-center items-center w-full p-6 bg-base-200/50 opacity-50">
                                <div>belum ada log ticket</div>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="card-body p-4">
                    @livewire('pages.ticket.log.create', ['ticket' => $ticket])
                </div>
            </div>
        </div>
    </div>
</div>
