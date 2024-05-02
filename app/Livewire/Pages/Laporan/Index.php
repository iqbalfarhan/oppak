<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Laporan;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $no = 1;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.laporan.index', [
            'datas' => Laporan::where('user_id', auth()->id())->latest('tanggal')->paginate(50)
        ]);
    }
}
