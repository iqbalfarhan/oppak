<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Laporan;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.laporan.index', [
            'datas' => Laporan::get()
        ]);
    }
}
