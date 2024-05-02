<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-3xl space-y-6">
            <h3 class="font-bold text-lg">Hello!</h3>
            <div class="table-wrapper">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Pelapor</th>
                        <th>Site</th>
                    </thead>
                    @foreach ($datas as $data)
                    @endforeach
                </table>
            </div>
            <div class="modal-action">
                <button wire:click="closeModal" class="btn btn-ghost">Close</button>
            </div>
        </div>
    </div>
</div>
