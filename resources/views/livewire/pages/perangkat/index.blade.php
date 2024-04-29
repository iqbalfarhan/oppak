<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-4xl">
            <h3 class="font-bold text-lg">Pengaturan data perangkat pergantian rutin</h3>
            <div class="py-4 space-y-3">
                <div class="flex">
                    <button class="btn btn-primary" wire:click="$dispatch('createPerangkat')">
                        <x-tabler-plus class="size-5" />
                        <span>Tambah perangkat</span>
                    </button>
                </div>
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Nama perangkat</th>
                            <th>Durasi PLN</th>
                            <th>Durasi Solar Cell</th>
                            <th class="text-center">Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr wire:key="{{ $data->id }}">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->durasi_pln }} Bulan</td>
                                    <td>{{ $data->durasi_solar_cell }} Bulan</td>
                                    <td>
                                        <div class="flex gap-1 justify-center">
                                            <button class="btn btn-xs btn-square btn-bordered"
                                                wire:click="$dispatch('editPerangkat', {perangkat: {{ $data->id }}})">
                                                <x-tabler-edit class="size-4" />
                                            </button>
                                            <button class="btn btn-xs btn-square btn-bordered"
                                                wire:click="$dispatch('deletePerangkat', {perangkat: {{ $data->id }}})">
                                                <x-tabler-trash class="size-4" />
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-action">
                @livewire('pages.perangkat.actions')
                <button class="btn btn-ghost" wire:click="closePerangkat">Close</button>
            </div>
        </div>
    </div>
</div>
