<?php

namespace App\Livewire\Pages\Laporan\Genset;

use App\Models\Genset;
use App\Models\Laporan;
use Livewire\Component;

class Show extends Component
{
    public Laporan $laporan;

    public function mount(Laporan $laporan)
    {
        $this->laporan = $laporan;
    }
    public function render()
    {
        return view('livewire.pages.laporan.genset.show', [
            'datas' => Genset::where('laporan_id', $this->laporan->id)->get()
        ]);
    }
}
