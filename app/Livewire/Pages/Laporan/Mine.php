<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Laporan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Mine extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $no = 1;

    protected $listeners = ['reload' => '$refresh'];

    public function deleteLaporan(Laporan $laporan)
    {
        $laporan->delete();
        $this->alert('success', 'Laporan deleted');
    }

    public function render()
    {
        return view('livewire.pages.laporan.mine', [
            'datas' => Laporan::where('user_id', auth()->id())->latest('tanggal')->paginate(50)
        ]);
    }
}
