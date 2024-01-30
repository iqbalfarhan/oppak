<div class="page-wrapper">
    @livewire('partial.header')

    <div class="card border-base-300 border-2 bg-base-200">
        <div class="card-body space-y-2">
            <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit omnis suscipit modi
                inventore officia
                doloribus iusto illum in voluptatum odio, totam est, praesentium ad vero. Iure molestiae cumque nam
                unde?</p>
            <div class="card-action">
                <label class="btn btn-primary" for="tamuCreate">
                    <x-tabler-circle-plus class="icon-5" />
                    <span>Input tamu baru</span>
                </label>
            </div>
        </div>
    </div>

    @livewire('pages.tamu.create')
</div>
