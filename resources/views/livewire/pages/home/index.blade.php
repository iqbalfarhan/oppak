<div class="page-wrapper">
    @livewire('partial.header')

    <div class="grid md:grid-cols-2 gap-3 md:gap-6">
        @livewire('widget.userinfo')
        @livewire('widget.tanggal')
    </div>

    @livewire('pages.laporan.dashboard')
    @livewire('pages.insidensial.dashboard')
</div>
