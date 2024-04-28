<?php

namespace App\Livewire\Pages\Laporan\Baterai;

use App\Models\Baterai;
use App\Models\Laporan;
use Livewire\Component;

class Index extends Component
{
    public Laporan $laporan;

    protected $listeners = ['reload' => '$refresh'];

    public function mount(Laporan $laporan)
    {
        $this->laporan = $laporan;
    }

    public function render()
    {
        return view('livewire.pages.laporan.baterai.index', [
            'datas' => Baterai::where('laporan_id', $this->laporan->id)->get()
        ]);
    }
}
