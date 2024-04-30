<div class="card card-compact divide-base-300 divide-y-2">
    <div class="card-body">
        <div class="flex flex-col md:flex-row justify-between md:items-end">
            <h3 class="text-3xl font-bold">
                {{ Number::percentage(($laporan / $siteCount) * 100) }}</h3>
            <div class="text-xs">{{ $laporan }}/{{ $siteCount }} laporan</div>
        </div>
    </div>
    <div class="card-body py-0 bg-base-200/50">
        <div class="flex justify-between text-xs">
            <span>{{ $witel }}</span>
            <span>{{ $siteCount }} Site</span>
        </div>
    </div>
</div>
