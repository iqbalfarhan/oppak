<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Download laporan',
    ])
    <div class="card">
        <div class="card-body space-y-4">
            <div class="card-title">Download laporan</div>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam, in temporibus eaque iste id non
                expedita doloremque sapiente quos culpa maxime iusto nulla eum corrupti ullam a maiores laudantium quo.
            </p>

            <div class="card-actions">
                <button class="btn btn-primary">
                    <x-tabler-download class="size-5" />
                    <span>Download laporan rutin</span>
                </button>
            </div>
        </div>
    </div>
</div>
