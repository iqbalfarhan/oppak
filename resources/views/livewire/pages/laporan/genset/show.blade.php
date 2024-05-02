<div class="card">
    <div class="card-body space-y-4">
        <h3 class="font-bold text-xl">Status genset</h3>
        <div class="grid md:grid-cols-2 gap-4">
            @foreach ($datas as $data)
                @livewire('pages.laporan.genset.card', ['genset' => $data], key($data->id))
            @endforeach
        </div>
    </div>
</div>
