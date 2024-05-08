<?php

namespace App\Livewire\Pages\Tamu;

use App\Models\Tamu;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $tanggal;
    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.tamu.index', [
            'datas' => Tamu::when($this->tanggal, function($tamu){
                $tamu->whereDate('created_at', $this->tanggal);
            })->orderBy('keluar')->latest('created_at')->get()
        ]);
    }
}
