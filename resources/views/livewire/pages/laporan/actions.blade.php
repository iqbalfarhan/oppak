<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box space-y-6" wire:submit="simpan">
            <h3 class="font-bold text-lg">Buat laporan rutin baru</h3>
            <div class="table-wrapper">
                <table class="table">
                    <tr>
                        <th>Pembuat laporan</th>
                        <td>{{ $user?->name }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal laporan</th>
                        <td>{{ date('d F Y', strtotime($tanggal)) }}</td>
                    </tr>
                    <tr>
                        <th>Witel Site / STO</th>
                        <td>{{ $site?->label }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="closeModal" class="btn btn-ghost">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-arrow-right class="size-5" />
                    <span>Selanjutnya</span>
                </button>
            </div>
        </form>
    </div>
</div>
