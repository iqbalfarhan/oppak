<?php

namespace App\Livewire\Widget;

use App\Models\Laporan;
use App\Models\Site;
use Livewire\Component;

class LaporanRutin extends Component
{
    public $witel;
    public $laporan = 0;

    public function loadLaporan()
    {
        $this->laporan = Laporan::whereHas('site', function($site){
            $site->where('witel', $this->witel);
        })->count();
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
