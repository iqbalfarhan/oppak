<div class="card">
    <div class="card-body p-4 md:p-8">
        <a href="{{ route('ticket.log', $ticket) }}" class="text-lg font-bold" wire:navigate>Log pengajuan ticket</a>
        <div class="py-2">
            @forelse ($datas as $log)
                <div @class([
                    'chat',
                    'chat-start' => !$log->is_me,
                    'chat-end' => $log->is_me,
                ])>
                    <div class="chat-image avatar tooltip tooltip-sm tooltip-success hidden md:flex"
                        data-tip="{{ Str::limit($log->user->name, 10) }}">
                        <div class="w-10 rounded-full bg-base-300">
                            <img src="{{ $log->user->image }}" alt="">
                        </div>
                    </div>
                    <div class="chat-bubble bg-base-300 text-base-content flex flex-col gap-2 text-sm max-w-md">
                        @if ($log->photo)
                            <div>
                                <img src="{{ $log->image }}"
                                    wire:click="$dispatch('showPreview', {url:'{{ $log->photo }}'})"
                                    class="rounded-lg max-w-full my-0.5" />
                            </div>
                        @endif
                        <div class="flex flex-col gap-1">
                            <span>{{ $log->uraian }}</span>
                            <span class="text-[8pt] opacity-50">{{ $log->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex justify-center items-center w-full p-6 bg-base-200/50 opacity-50">
                    <div>belum ada log ticket</div>
                </div>
            @endforelse
        </div>
    </div>
    @if (!$ticket->done)
        @can('ticket.chat')
            <div class="card-body p-4 md:p-8">
                @livewire('pages.ticket.log.create', ['ticket' => $ticket])
            </div>
        @endcan
    @endif
</div>
