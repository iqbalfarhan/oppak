<?php

namespace App\Exports;

use App\Models\Laporan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView
{
    public $tanggal = [];

    public function __construct($tanggal){
        $this->tanggal = $tanggal;
    }

    public function view(): View
    {
        return view('print.laporan', [
            'datas' => Laporan::whereBetween('tanggal', $this->tanggal)->get()
        ]);
    }
}
