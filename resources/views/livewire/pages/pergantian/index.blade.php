<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Pergantian rutin',
    ])

    <div class="flex flex-col md:flex-row gap-1">
        <select type="text" class="select select-bordered" placeholder="Pencarian" wire:model.live="witel">
            <option value="">PILIH WITEL</option>
            <option value="BALIKPAPAN">BALIKPAPAN</option>
            <option value="SAMARINDA">SAMARINDA</option>
            <option value="KALBAR">KALBAR</option>
            <option value="KALSEL">KALSEL</option>
            <option value="KALTENG">KALTENG</option>
            <option value="KALTARA">KALTARA</option>
        </select>
        <input type="text" class="input input-bordered" placeholder="Pencarian" />
        <div class="flex-1"></div>
        <button class="btn btn-primary">
            <x-tabler-plus class="size-5" />
            <span>Buat laporan</span>
        </button>
        <button class="btn btn-primary" wire:click="$dispatch('showPerangkat')">
            <x-tabler-list class="size-5" />
            <span>List pergantian</span>
        </button>
    </div>

    <div class="table-wrapper">
        <table class="table vertical-header-table">
            <thead>
                <th>No</th>
                <th class="w-full">Witel - Site</th>
                @foreach ($perangkats as $prkt)
                    <th class="text-center"><span>{{ $prkt }}</span></th>
                @endforeach
            </thead>
            <tbody>
                @foreach ($sites as $site)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $site->label }}</td>
                        @foreach ($perangkats as $prkt)
                            <td>
                                <button class="btn btn-xs btn-bordered">
                                    {{ fake()->randomNumber(2) }}
                                </button>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('pages.perangkat.index')
</div>
