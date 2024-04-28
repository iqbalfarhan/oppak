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
        <button class="btn btn-primary">
            <x-tabler-list class="size-5" />
            <span>List pergantian</span>
        </button>
    </div>

    <div class="table-wrapper">
        <table class="table vertical-header-table">
            <thead>
                <th>No</th>
                <th class="w-full">Witel - Site</th>
                <th class="text-center"><span>Filter Oli</span></th>
                <th class="text-center"><span>Filter Solar</span></th>
                <th class="text-center"><span>Oli</span></th>
                <th class="text-center"><span>Water separator</span></th>
                <th class="text-center"><span>Battery starter</span></th>
                <th class="text-center"><span>Refill air baterai</span></th>
                <th class="text-center"><span>Panbel genset</span></th>
                <th class="text-center"><span>Maintenace AC</span></th>
                <th class="text-center"><span>Cuci tangki besar</span></th>
                <th class="text-center"><span>Cuci tangki kecil</span></th>
            </thead>
            <tbody>
                @foreach ($sites as $site)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $site->label }}</td>
                        <td>
                            <button class="btn btn-xs btn-bordered">
                                {{ fake()->randomNumber(2) }}
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-xs btn-bordered">
                                {{ fake()->randomNumber(2) }}
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-xs btn-bordered">
                                {{ fake()->randomNumber(2) }}
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-xs btn-bordered">
                                {{ fake()->randomNumber(2) }}
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-xs btn-bordered">
                                {{ fake()->randomNumber(2) }}
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-xs btn-bordered">
                                {{ fake()->randomNumber(2) }}
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-xs btn-bordered">
                                {{ fake()->randomNumber(2) }}
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-xs btn-bordered">
                                {{ fake()->randomNumber(2) }}
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-xs btn-bordered">
                                {{ fake()->randomNumber(2) }}
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-xs btn-bordered">
                                {{ fake()->randomNumber(2) }}
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
