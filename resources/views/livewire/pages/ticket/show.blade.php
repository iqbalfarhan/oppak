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

    <div class="grid md:grid-cols-3 gap-6">
        <div class="md:col-span-full table-wrapper">
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
            </table>
        </div>
        <div class="card divide-y-2 border-base-300">
            <div class="card-body space-y-2">
                <h3 class="font-bold text-lg">Progress ticket ({{ Number::percentage($ticket->progress) }})</h3>
                <input type="range" min="0" max="100" value="{{ $ticket->progress }}"
                    wire:model.live="progress" @class(['range range-sm', 'range-primary' => !$ticket->done]) @disabled($ticket->done) />
            </div>
            @if ($progress == 100)
                <div class="card-body space-y-2">
                    <h3 class="font-bold">Pengajuan close ticket</h3>
                    <p class="text-sm">Ini akan mengirim pengajuan close ticket kepembuat ticket
                        ({{ $ticket->user->name }}).
                    </p>
                    <div class="card-actions">
                        <button class="btn btn-primary btn-block">
                            <x-tabler-exclamation-circle class="size-5" />
                            <span>Ajukan close ticket</span>
                        </button>
                    </div>
                </div>
            @else
                <div class="card-body py-4">
                    <p class="text-xs opacity-75">Bisa mengajukan close ticket jika progress sudah 100%.</p>
                </div>
            @endif
        </div>
        <div class="card md:col-span-2 md:row-span-3 divide-y-2">
            <div class="card-body">
                <h3 class="font-bold">Pengajuan close ticket</h3>
                <div class="py-4">
                    @for ($i = 0; $i <= 5; $i++)
                        <div @class([
                            'chat',
                            'chat-start' => $i % 2 == 0,
                            'chat-end' => $i % 2 != 0,
                        ])>
                            <div class="chat-image avatar placeholder">
                                <div class="w-10 rounded-full bg-base-300">
                                    <span>A</span>
                                </div>
                            </div>
                            <div class="chat-bubble">{{ fake()->sentence() }}</div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="card-body p-4">
                <div class="card-actions">
                    <div class="flex w-full gap-2">
                        <input type="text" placeholder="Tulis pesan" class="input input-bordered w-full">
                        <button class="btn btn-primary">
                            <x-tabler-arrow-right class="size-5" />
                            <span>Kirim</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @if ($ticket->done)
            <div class="card">
                <div class="card-body space-y-2">
                    <h3 class="font-bold text-lg">Batalkan penerimaan df</h3>
                    <p class="text-sm">Ini akan mengirim pengajuan close ticket kepembuat ticket
                        ({{ $ticket->user->name }}).
                    </p>
                    <div class="card-actions">
                        <button class="btn btn-primary btn-block">
                            <x-tabler-exclamation-circle class="size-5" />
                            <span>Ajukan close ticket</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
