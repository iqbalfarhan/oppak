<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        @vite('resources/css/app.css')
    </head>

    <body>
        <table class="table table-xs text-xs">
            <thead class="text-center">
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Tanggal</th>
                    <th rowspan="2">Pelapor</th>
                    <th rowspan="2">Witel</th>
                    <th rowspan="2">Site</th>
                    <th rowspan="2">Genset</th>
                    <th rowspan="2">Amf</th>
                    <th rowspan="2">Beterai</th>
                    <th rowspan="2">Rectifier</th>
                    <th colspan="4">Temperatur ruangan</th>
                    <th rowspan="2">Bbm</th>
                </tr>
                <tr>
                    <th>rectifier</th>
                    <th>metro</th>
                    <th>transmisi</th>
                    <th>gpon</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->tanggal->format('d F Y') }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->site->witel }}</td>
                        <td>{{ $data->site->name }}</td>
                        <td>{!! $data->gensets ? implode('<br>', $data->gensets->pluck('label')->toArray()) : '' !!}</td>
                        <td>{{ $data->amf?->label }}</td>
                        <td>{!! $data->baterais ? implode('<br>', $data->baterais->pluck('label')->toArray()) : '' !!}</td>
                        <td>{!! $data->rectifiers ? implode('<br>', $data->rectifiers->pluck('label')->toArray()) : '' !!}</td>
                        <td>{{ $data->temperatur?->rectifier }}</td>
                        <td>{{ $data->temperatur?->metro }}</td>
                        <td>{{ $data->temperatur?->transmisi }}</td>
                        <td>{{ $data->temperatur?->gpon }}</td>
                        <td>{{ $data->bbm?->volume }} {{ $data->bbm?->satuan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
