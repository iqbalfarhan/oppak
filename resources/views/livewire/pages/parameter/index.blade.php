<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'Parameter input laporan rutin'])

    <div class="flex justify-between">
        <input type="text" class="input input-bordered" placeholder="Pencarian">
        @can('parameter.create')
            <button class="btn btn-primary" wire:click="$dispatch('createParameter')">
                <x-tabler-plus class="size-5" />
                <span>Tambah paramter</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Satuan</th>
                <th>Label</th>
                <th>Type</th>
                <th>Valid jika</th>
                @canany(['parameter.edit', 'parameter.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->satuan }}</td>
                        <td>{{ $data->label }}</td>
                        <td>{{ $data->type }}</td>
                        <td>
                            @if ($data->type == 'range')
                                {{ $data->min }} ~ {{ $data->max }} {{ $data->satuan }}
                            @elseif ($data->type == 'istrue')
                                {{ $data->trueif }}
                            @endif
                        </td>
                        @canany(['parameter.edit', 'parameter.delete'])
                            <td>
                                <div class="flex justify-center gap-1">
                                    @can('parameter.edit')
                                        <button class="btn btn-xs btn-bordered btn-square"
                                            wire:click="$dispatch('editParameter', {parameter:{{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('parameter.delete')
                                        <button class="btn btn-xs btn-bordered btn-square"
                                            wire:click="$dispatch('deleteParameter', {parameter:{{ $data->id }}})">
                                            <x-tabler-trash class="size-4" />
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        @endcanany
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('pages.parameter.actions')
</div>
