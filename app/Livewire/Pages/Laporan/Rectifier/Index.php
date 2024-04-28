<?php

namespace App\Livewire\Pages\Laporan\Rectifier;

use App\Models\Laporan;
use App\Models\Rectifier;
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
        return view('livewire.pages.laporan.rectifier.index', [
            'datas' => Rectifier::where('laporan_id', $this->laporan->id)->get()
        ]);
    }
}
