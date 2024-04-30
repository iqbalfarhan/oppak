<?php

namespace App\Livewire\Pages\Laporan;

use Livewire\Component;

class Download extends Component
{
    public $tanggal = [];

    public function filter(){
        $this->validate([
            'tanggal.0' => 'required',
            'tanggal.1' => 'required',
        ]);

        dd($this->tanggal);
    }

    public function render()
    {
        return view('livewire.pages.laporan.download');
    }
}
