<?php

namespace App\Livewire\Pages\Home;

use Livewire\Attributes\On;
use Livewire\Component;

class CariTanggal extends Component
{
    public $show = false;
    public $isRange = false;

    public $tanggal;
    public $range = [];

    #[On('filterTanggal')]
    public function filterTanggal(){
        $this->show = true;
    }

    public function setTanggal(){
        if ($this->isRange) {
            $this->validate([
                'range.0' => 'required',
                'range.1' => 'required'
            ]);

            dd($this->range);
            $this->dispatch('rangeTanggal', $this->range);
        }
        else{
            $this->validate([
                'tanggal' => 'required'
            ]);

            dd($this->tanggal);
            $this->dispatch('tanggal', $this->tanggal);
        }
        $this->show = false;
    }

    #[On('closeModal')]
    public function closeModal(){
        $this->show = false;
        $this->isRange = false;
        $this->tanggal = null;
        $this->range = [];
    }

    public function render()
    {
        return view('livewire.pages.home.cari-tanggal');
    }
}
