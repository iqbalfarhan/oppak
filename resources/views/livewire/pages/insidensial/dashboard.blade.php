<div class="flex flex-col gap-4 justify-between">
    <div class="flex justify-between gap-1 items-end">
        <h3 class="font-bold text-lg">Summary laporan insidensial :</h3>
    </div>
    <div class="table-wrapper">
        <table class="table table-xs">
            @foreach ($datas as $month => $number)
                <tr class="text-xs opacity-50 first:opacity-100 first:font-bold first:text-lg">
                    <td>{{ $month }}</td>
                    <td>{{ $number }} laporan</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
