<div class="page-wrapper">
    @livewire('partial.header')

    <div class="grid md:grid-cols-2 gap-3 md:gap-6">
        @livewire('widget.userinfo')
        @livewire('widget.tanggal')
    </div>

    @can('laporan.index')
        @livewire('pages.laporan.dashboard')
    @endcan

    @canany(['insidensial.index', 'pergantian.index'])
        <div class="grid md:grid-cols-2 gap-3 md:gap-6">
            @can('insidensial.index')
                <div>@livewire('pages.insidensial.dashboard')</div>
            @endcan
            @can('pergantian.index')
                <div>@livewire('pages.pergantian.dashboard')</div>
            @endcan
        </div>
    @endcanany
</div>
