<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Laporan;
use App\Models\Site;
use Livewire\Attributes\On;
use Livewire\Component;

class Dashboard extends Component
{
    public $tanggal;

    #[On('rangeTanggal')]
    public function rangeTanggal(Array $tanggal)
    {
        $this->tanggal = implode(" - ", array_map(function($item){
            return date('d F Y', strtotime($item));
        }, $tanggal));
    }

    #[On('setTanggal')]
    public function setTanggal($tanggal)
    {
        $this->tanggal = date('d F Y', strtotime($tanggal));
    }

    public function mount(){
        $this->tanggal = date('d F Y');
    }


    public function render()
    {
        return view('livewire.pages.laporan.dashboard', [
            'witels' => Site::pluck('witel')->unique(),
        ]);
    }
}
