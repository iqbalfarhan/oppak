<?php

namespace App\Livewire\Widget;

use App\Models\Laporan;
use App\Models\Site;
use Livewire\Component;

class LaporanRutin extends Component
{
    public $witel;
    public $laporan;

    public function loadLaporan()
    {
        $this->laporan = Laporan::where('tanggal', date('Y-m-d'))->whereHas('site', function($site){
            $site->where('witel', $this->witel);
        })->where('done', true)->count();
    }

    public function mount($witel = "null")
    {
        $this->witel = $witel;
    }

    public function render()
    {
        return view('livewire.widget.laporan-rutin', [
            'siteCount' => Site::where('witel', $this->witel)->count()
        ]);
    }
}
