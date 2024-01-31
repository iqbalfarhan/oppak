<div class="page-wrapper max-w-full">
    @livewire('partial.header', [
        'title' => 'Operasional site PAK',
    ])

    <div class="grid md:grid-cols-4 gap-6">
        <div class="col-span-3">
            <div class="space-y-4">
                <div class="flex justify-between">
                    <input type="date" class="input input-bordered">
                    <button class="btn border-2 border-base-300">
                        <x-tabler-calendar class="icon-5" />
                        <span>Range tanggal</span>
                    </button>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    @foreach ($lokasis as $witel => $site)
                        <div class="card card-compact bg-base-100 border-2 border-base-300 overflow-hidden">
                            <div class="card-body border-b-2">
                                <div class="flex justify-between">
                                    <div class="flex flex-col truncate">
                                        <h3>{{ $witel }}</h3>
                                        <span class="text-xs opacity-75">
                                            {{ $site->count() }} site PAK
                                        </span>
                                    </div>
                                    <h1 class="text-xl md:text-3xl font-bold">100%</h1>
                                </div>
                            </div>
                            <div class="card-body bg-base-200 py-4">
                                <span class="text-xs">
                                    6 laporan hari ini
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="hidden md:block">
            @livewire('pages.user.widget', ['user' => $user])
        </div>
    </div>
</div>
