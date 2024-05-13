<div class="card card-compact divide-base-300 divide-y-2" wire:init="loadLaporan">
    <div class="card-body cursor-pointer"
        wire:click="$dispatch('listbywitel', {witel:'{{ $witel }}', tanggal: '{{ $tanggal }}'})">
        <div class="flex flex-col md:flex-row justify-between md:items-end">
            <h3 class="text-3xl font-bold" wire:loading.class="loading">
                @if ($siteCount != 0)
                    {{ Number::percentage(($laporan / $days_count / $siteCount) * 100) }}
                @else
                    {{ Number::percentage(0) }}
                @endif
            </h3>
            <div class="text-xs">{{ round($laporan) }}/{{ $siteCount * $days_count }} laporan</div>
        </div>
    </div>
    <div class="card-body py-0 bg-base-200/50">
        <div class="flex justify-between text-xs">
            <span>{{ $witel }}</span>
            <span>{{ $siteCount }} Site</span>
        </div>
    </div>
</div>
