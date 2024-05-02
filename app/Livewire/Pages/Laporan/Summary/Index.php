<?php

namespace App\Livewire\Pages\Laporan\Summary;

use App\Models\Laporan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;

    public Laporan $laporan;

    public function mount(Laporan $laporan)
    {
        $this->laporan = $laporan;
    }

    public function toggleDone()
    {
        $newDone = !$this->laporan->done;
        $this->laporan->update([
            'done' => $newDone
        ]);

        $this->alert('success', 'Status laporan berhasil disimpan');
    }

    public function render()
    {
        return view('livewire.pages.laporan.summary.index');
    }
}
