<div class="flex flex-col gap-4 justify-between">
    <div class="flex justify-between gap-1 items-end">
        <h3 class="font-bold text-lg">Summary laporan insidensial :</h3>
    </div>
    <div class="table-wrapper">
        <table class="table">
            @foreach ($datas as $month => $number)
                <tr class="opacity-50 first:opacity-100">
                    <td>{{ $month }}</td>
                    <td>:</td>
                    <td class="w-1/2">
                        <progress class="progress progress-primary" value="{{ $number }}"
                            max="{{ max($datas) }}">{{ $number }}</progress>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
