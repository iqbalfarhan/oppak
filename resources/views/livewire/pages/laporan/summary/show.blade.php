<div class="card card-divider">
    <div class="card-body space-y-4">
        <h3 class="font-bold text-xl">Summary laporan</h3>
        <div class="table-wrapper">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Pembuat laporan</td>
                        <td>:</td>
                        <td>{{ $laporan->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal laporan</td>
                        <td>:</td>
                        <td>{{ $laporan->tanggal->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td>Witel Site / STO</td>
                        <td>:</td>
                        <td>{{ $laporan->site->label }}</td>
                    </tr>
                    <tr>
                        <td>Waktu laporan</td>
                        <td>:</td>
                        <td>{{ $laporan->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>{{ $laporan->done ? 'Done' : 'Draft' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
