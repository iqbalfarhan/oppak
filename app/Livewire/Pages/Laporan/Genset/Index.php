<?php

namespace App\Livewire\Pages\Laporan\Genset;

use App\Models\Genset;
use App\Models\Laporan;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['reload' => '$refresh'];
    public Laporan $laporan;

    public function mount(Laporan $laporan)
    {
        $this->laporan = $laporan;
    }

    public function render()
    {
        return view('livewire.pages.laporan.genset.index', [
            'datas' => Genset::where('laporan_id', $this->laporan->id)->get()
        ]);
    }
}
