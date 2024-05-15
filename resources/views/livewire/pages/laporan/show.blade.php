<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'Detail laporan'])

    <div class="card card-compact card-divider">
        <div class="card-body space-y-4">
            <h3 class="text-xl font-bold">Summary laporan</h3>
            <div class="table-wrapper">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Pembuat laporan</td>
                            <td>:</td>
                            <td>{{ $laporan->user->name }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal laporan</td>
                            <td>:</td>
                            <td>{{ $laporan->tanggal->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Witel Site / STO</td>
                            <td>:</td>
                            <td>{{ $laporan->site->label }}</td>
                        </tr>
                        <tr>
                            <td>Waktu laporan</td>
                            <td>:</td>
                            <td>{{ $laporan->created_at->format('d F Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td @class([
                                'font-bold',
                                'text-warning' => !$laporan->done,
                                'text-success' => $laporan->done,
                            ])>{{ $laporan->done ? 'Done' : 'Draft' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @canany(['laporan.edit', 'laporan.delete'])
            <div class="card-body bg-base-200/50 py-4 flex-row-reverse">
                <div class="card-actions">
                    @can('laporan.edit')
                        <a href="{{ route('laporan.edit', $laporan) }}" class="btn btn-bordered btn-sm gap-2" wire:navigate>
                            <x-tabler-edit class="size-4" />
                            <span>Edit</span>
                        </a>
                    @endcan
                </div>
            </div>
        @endcanany
    </div>
    <div class="card card-compact">
        <div class="card-body space-y-4">
            <h3 class="text-xl font-bold">Genset</h3>
            <div class="grid md:grid-cols-2 gap-6">
                @foreach ($laporan->gensets as $key => $genset)
                    <div>
                        <div class="card card-compact card-divider">
                            <div class="card-body">
                                <div class="flex flex-col md:flex-row gap-4">
                                    <div>
                                        <div class="avatar"
                                            wire:click="$dispatch('showPreview', {url: '{{ $genset->photo }}'})">
                                            <div class="w-24 rounded-lg">
                                                <img src="{{ $genset->gambar }}" alt="Shoes" class="h-fit" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-1 flex-col gap-2">
                                        <div class="flex flex-col px-2">
                                            <div class="text-xs opacity-50">Keterangan genset {{ $key + 1 }}</div>
                                            <div>{{ $genset->keterangan }}</div>
                                        </div>
                                        <div class="table-wrapper">
                                            <table class="table table-xs h-fit">
                                                <tr @class(['text-error' => !$genset->is_valid['ruangan_bersih']])>
                                                    <td>Kebersihan ruangan</td>
                                                    <td>{{ $genset->ruangan_bersih ? 'Bersih' : 'tidak bersih' }}</td>
                                                </tr>
                                                <tr @class(['text-error' => !$genset->is_valid['engine_bersih']])>
                                                    <td>engine_bersih</td>
                                                    <td>{{ $genset->engine_bersih ? 'Bersih' : 'tidak bersih' }}</td>
                                                </tr>
                                                <tr @class(['text-error' => !$genset->is_valid['suhu_ruangan']])>
                                                    <td>suhu_ruangan</td>
                                                    <td>{{ $genset->suhu_ruangan }} Celcius</td>
                                                </tr>
                                                <tr @class(['text-error' => !$genset->is_valid['bbm_utama']])>
                                                    <td>bbm_utama</td>
                                                    <td>{{ $genset->bbm_utama }} Liter</td>
                                                </tr>
                                                <tr @class(['text-error' => !$genset->is_valid['bbm_harian']])>
                                                    <td>bbm_harian</td>
                                                    <td>{{ $genset->bbm_harian }} Liter</td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            @foreach ($genset->bateraistarters as $key => $bs)
                                <div class="card-body">
                                    <p class="text-sm">Baterai starter {{ $key + 1 }} : {{ $bs->label }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card card-compact card-divider">
        <div class="card-body space-y-4">
            <h3 class="text-xl font-bold">AMF</h3>
            <div class="avatar" wire:click="$dispatch('showPreview', {url: '{{ $laporan->amf?->photo }}'})">
                <div class="w-24 rounded-lg">
                    <img src="{{ $laporan->amf?->image ?? url('noimage.png') }}" alt="Shoes" class="h-fit" />
                </div>
            </div>
        </div>
        <div class="card-body py-4">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div class="flex flex-col">
                    <div class="text-xs opacity-50">Kebersihan ruangan</div>
                    <div @class(['text-error' => !$laporan->amf?->is_valid['ruangan_bersih']])>
                        Ruangan {{ $laporan->amf?->ruangan_bersih ? 'Bersih' : 'Tidak bersih' }}
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-50">Kebersihan engine</div>
                    <div @class(['text-error' => !$laporan->amf?->is_valid['engine_bersih']])>
                        Engine {{ $laporan->amf?->engine_bersih ? 'Bersih' : 'Tidak bersih' }}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body py-4">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @if ($laporan->amf)
                    @foreach ($laporan->amf?->tegangan as $key => $value)
                        <div class="flex flex-col">
                            <div class="text-xs opacity-50">Tegangan {{ $key }}</div>
                            <div @class(['text-error' => !$laporan->amf?->is_valid['tegangan'][$key]])>
                                {{ $value }} volt
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="card-body py-4">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($laporan->amf?->arus ?? [] as $key => $value)
                    <div class="flex flex-col">
                        <div class="text-xs opacity-50">arus {{ $key }}</div>
                        <div @class(['text-error' => !$laporan->amf?->is_valid['arus'][$key]])>
                            {{ $value }} ampere
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card-body py-4">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div class="flex flex-col">
                    <div class="text-xs opacity-50">Penggunaan listrik</div>
                    <div>{{ $laporan->amf?->kwh }} Kwh</div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-50">Jam jalan genset</div>
                    <div>{{ $laporan->amf?->jam_jalan_genset }} jam</div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-compact">
        <div class="card-body space-y-4">
            <h3 class="text-xl font-bold">Baterai</h3>
            <div class="grid md:grid-cols-2 gap-6">
                @if ($laporan->baterais)
                    @foreach ($laporan->baterais as $key => $baterai)
                        <div class="card card-compact">
                            <div class="card-body">
                                <div class="flex flex-col md:flex-row gap-4">
                                    <div>
                                        <div class="avatar"
                                            wire:click="$dispatch('showPreview', {url: '{{ $baterai->photo }}'})">
                                            <div class="w-24 rounded-lg">
                                                <img src="{{ $baterai->image }}" alt="Shoes" class="h-fit" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-1 flex-col gap-2">
                                        <div class="flex flex-col px-2">
                                            <div class="text-xs opacity-50">Baterai {{ $key + 1 }}</div>
                                        </div>
                                        <div class="table-wrapper">
                                            <table class="table table-xs h-fit">
                                                @foreach ($baterai->tegangan as $key => $tegangan)
                                                    <tr @class(['text-error' => !$baterai->is_valid['tegangan'][$key]])>
                                                        <td>tegangn total bank {{ $key + 1 }}</td>
                                                        <td>{{ $tegangan }} volt</td>
                                                    </tr>
                                                @endforeach

                                                <tr @class(['text-error' => !$baterai->is_valid['elektrolit']])>
                                                    <td>Elektrolit</td>
                                                    <td>{{ $baterai->elektrolit }}</td>
                                                </tr>

                                                <tr @class(['text-error' => !$baterai->is_valid['bj_cell']])>
                                                    <td>BJ Cell</td>
                                                    <td>{{ $baterai->bj_cell }} volt</td>
                                                </tr>

                                                @foreach ($baterai->bj_pilot_cell_bank as $key => $pilot)
                                                    <tr @class([
                                                        'text-error' => !$baterai->is_valid['bj_pilot_cell_bank'][$key],
                                                    ])>
                                                        <td>BJ Pilot cell bank {{ $key + 1 }}</td>
                                                        <td>{{ $pilot }} volt</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="card card-compact">
        <div class="card-body space-y-4">
            <h3 class="text-xl font-bold">Rectifier</h3>
            <div class="grid md:grid-cols-2 gap-6">
                @foreach ($laporan->rectifiers as $key => $rectifier)
                    <div class="card card-compact">
                        <div class="card-body">
                            <div class="flex flex-col md:flex-row gap-4">
                                <div>
                                    <div class="avatar"
                                        wire:click="$dispatch('showPreview', {url: '{{ $rectifier->photo }}'})">
                                        <div class="w-24 rounded-lg">
                                            <img src="{{ $rectifier->image }}" alt="Shoes" class="h-fit" />
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-2 flex-1">
                                    <div class="flex flex-col px-2">
                                        <div class="text-xs opacity-50">Keterangan rectifier {{ $key + 1 }}</div>
                                        <div>{{ $rectifier->keterangan }}</div>
                                    </div>
                                    <div class="table-wrapper">
                                        <table class="table table-xs">
                                            <tr>
                                                <td>Catuan input</td>
                                                <td>{{ $rectifier->catuan_input }}</td>
                                            </tr>
                                            <tr @class(['text-error' => !$rectifier->is_valid['tegangan_output']])>
                                                <td>Tegangan output</td>
                                                <td>{{ $rectifier->tegangan_output }} Volt</td>
                                            </tr>
                                            <tr @class(['text-error' => !$rectifier->is_valid['arus_output']])>
                                                <td>Arus output</td>
                                                <td>{{ $rectifier->arus_output }} Ampere</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="grid md:grid-cols-2 gap-6">
        <div class="card card-compact">
            <div class="card-body space-y-4">
                <h3 class="text-xl font-bold">Temperatur ruangan</h3>
                <div class="flex flex-col md:flex-row gap-4">
                    <div>
                        <div class="avatar"
                            wire:click="$dispatch('showPreview', {url: '{{ $laporan->temperatur?->photo }}'})">
                            <div class="w-24 rounded-lg">
                                <img src="{{ $laporan->temperatur?->image ?? url('noimage.png') }}" alt="Shoes"
                                    class="h-fit" />
                            </div>
                        </div>
                    </div>
                    <div class="table-wrapper flex-1">
                        <table class="table table-xs">
                            <tr @class([
                                'text-error' => !$laporan->temperatur?->is_valid['rectifier'],
                            ])>
                                <td>Ruang rectifier</td>
                                <td>{{ $laporan->temperatur?->rectifier }} Celcius</td>
                            </tr>
                            <tr @class(['text-error' => !$laporan->temperatur?->is_valid['metro']])>
                                <td>Ruang metro</td>
                                <td>{{ $laporan->temperatur?->metro }} Celcius</td>
                            </tr>
                            <tr @class([
                                'text-error' => !$laporan->temperatur?->is_valid['transmisi'],
                            ])>
                                <td>Ruang transmisi</td>
                                <td>{{ $laporan->temperatur?->transmisi }} Celcius</td>
                            </tr>
                            <tr @class(['text-error' => !$laporan->temperatur?->is_valid['gpon']])>
                                <td>Ruang gpon</td>
                                <td>{{ $laporan->temperatur?->gpon }} Celcius</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-compact">
            <div class="card-body space-y-4">
                <h3 class="text-xl font-bold">Bahan bakar minyak</h3>
                <div class="flex flex-col md:flex-row gap-4">
                    <div>
                        <div class="avatar"
                            wire:click="$dispatch('showPreview', {url: '{{ $laporan->bbm?->photo }}'})">
                            <div class="w-24 rounded-lg">
                                <img src="{{ $laporan->bbm?->image ?? url('noimage.png') }}" alt="Shoes"
                                    class="h-fit" />
                            </div>
                        </div>
                    </div>
                    <div class="table-wrapper flex-1">
                        <table class="table table-xs h-fit">
                            <tr @class(['text-error' => !$laporan->bbm?->is_valid['volume']])>
                                <td>Volume BBM</td>
                                <td>{{ $laporan->bbm?->volume }}</td>
                            </tr>
                            <tr>
                                <td>Satuan</td>
                                <td>{{ $laporan->bbm?->satuan }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewire('pages.laporan.actions')
</div>
