<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Laporan;
use Livewire\Attributes\On;
use Livewire\Component;

class Listbywitel extends Component
{
    public $show = false;
    public $witel;
    public $tanggal;

    #[On('listbywitel')]
    public function listbywitel($witel, $tanggal = null){
        $this->show = true;
        $this->witel = $witel;
        $this->tanggal = $tanggal;
    }

    public function closeModal(){
        $this->show = null;
        $this->witel = null;
    }

    public function render()
    {
        return view('livewire.pages.laporan.listbywitel', [
            'datas' => $this->witel ? Laporan::whereHas('site', function($site){
                $site->where('witel', $this->witel);
            })->when($this->tanggal, function($laporan){
                $laporan->where('tanggal', $this->tanggal);
            })->where('done', true)->get() : collect([])
        ]);
    }
}
