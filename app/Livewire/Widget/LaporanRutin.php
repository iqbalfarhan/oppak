<?php

namespace App\Livewire\Widget;

use App\Models\Site;
use Livewire\Component;

class LaporanRutin extends Component
{
    public $witel;
    public $siteCount = 0;

    public function mount($witel){
        $this->witel = $witel;
        $this->siteCount = Site::where('witel', $witel)->count();
    }

    public function render()
    {
        return view('livewire.widget.laporan-rutin');
    }
}
