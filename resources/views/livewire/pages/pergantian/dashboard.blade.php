<div class="card card-divider card-compact">
    <div class="card-body flex flex-row gap-4 items-center bg-base-200/50">
        <div class="flex flex-col flex-1 items-center">
            <div class="text-lg font-bold">Pergantian rutin</div>
            <div class="text-xs line-clamp-1">Reminder pergantian hari ini</div>
        </div>
    </div>
    @foreach ($datas as $site => $data)
        <div class="card-body">
            <h2 class="font-bold">{{ $data->first()->site->label }}</h2>
            <div class="flex flex-col">
                @foreach ($data as $pergantian)
                    <div class="text-xs">
                        {{ $pergantian->perangkat->name }}
                        <span class="text-xs opacity-50">(Terakhir tanggal
                            {{ $pergantian->tanggal->format('d F Y') }})</span>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
