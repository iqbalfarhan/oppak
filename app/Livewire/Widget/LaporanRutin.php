<?php

namespace App\Livewire\Widget;

use App\Models\Site;
use Livewire\Component;

class LaporanRutin extends Component
{
    public $witel;
    public $laporan = 0;

    public function mount($witel = "null", $laporan = 0){
        $this->witel = $witel;
    }

    public function render()
    {
        return view('livewire.widget.laporan-rutin', [
            'siteCount' => Site::where('witel', $this->witel)->count()
        ]);
    }
}
