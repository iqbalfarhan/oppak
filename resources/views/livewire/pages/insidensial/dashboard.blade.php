<div class="card card-compact card-divider">
    <div class="card-body bg-base-200/50 py-0">
        <h3 class="font-bold text-md">Summary laporan insidensial :</h3>
    </div>
    <div class="card-body">
        <div class="table-wrapper">
            <table class="table">
                @forelse ($datas as $month => $number)
                    <tr class="opacity-50 first:opacity-100">
                        <td>
                            <div class="tooltip" data-tip="{{ $number }} laporan">
                                {{ $month }}
                            </div>
                        </td>
                        <td>:</td>
                        <td class="w-1/2">
                            <progress class="progress progress-primary" value="{{ $number }}"
                                max="{{ max($datas) }}">{{ $number }}</progress>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">@livewire('partial.nocontent')</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>
