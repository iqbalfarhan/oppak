<?php

namespace App\Livewire\Pages\Laporan;

use App\Exports\LaporanExport;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Download extends Component
{
    public $tanggal = [];

    public function filter(){
        $this->validate([
            'tanggal.0' => 'required',
            'tanggal.1' => 'required',
        ]);

        return Excel::download(new LaporanExport($this->tanggal), 'laporan'.uniqid().'.xlsx');
    }

    public function render()
    {
        return view('livewire.pages.laporan.download');
    }
}
