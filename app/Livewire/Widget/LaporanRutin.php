<?php

namespace App\Livewire\Widget;

use App\Models\Laporan;
use App\Models\Site;
use DateTime;
use Livewire\Attributes\On;
use Livewire\Component;

class LaporanRutin extends Component
{
    public $witel;
    public $tanggal;
    public $days_count = 1;
    public $laporan;

    #[On('rangeTanggal')]
    public function rangeTanggal($range){
        $this->laporan = Laporan::whereBetween('tanggal', $range)->whereHas('site', function($site){
            $site->where('witel', $this->witel);
        })->where('done', true)->count();

        $this->days_count = $this->getSelisih($range);
    }

    #[On('setTanggal')]
    public function setTanggal($tanggal){
        $this->tanggal = $tanggal;
        $this->loadLaporan();

        $this->days_count = 1;
    }

    public function loadLaporan()
    {
        $this->laporan = Laporan::where('tanggal', $this->tanggal)->whereHas('site', function($site){
            $site->where('witel', $this->witel);
        })->where('done', true)->count();
    }

    public function mount($witel = "null")
    {
        $this->witel = $witel;
        $this->tanggal = date('Y-m-d');
    }

    public function getSelisih(Array $range){
        $date1 = new DateTime($range[0]);
        $date2 = new DateTime($range[1]);
        $interval = $date1->diff($date2);

        return $interval->days + 1;
    }

    public function render()
    {
        return view('livewire.widget.laporan-rutin', [
            'siteCount' => Site::where('witel', $this->witel)->count()
        ]);
    }
}
