<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Laporan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $no = 1;
    public $tanggal;

    protected $listeners = ['reload' => '$refresh'];

    public function deleteLaporan(Laporan $laporan)
    {
        $laporan->delete();
        $this->alert('success', 'Laporan deleted');
    }

    public function render()
    {
        return view('livewire.pages.laporan.index', [
            'datas' => Laporan::when($this->tanggal, function($laporan){
                $laporan->where('tanggal', $this->tanggal);
            })->latest('tanggal')->paginate(50)
        ]);
    }
}
