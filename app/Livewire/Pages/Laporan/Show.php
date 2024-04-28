<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Laporan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Show extends Component
{
    use LivewireAlert;

    public $page = "rectifier";

    public $pageList = [
        "summary" => "Summary",
        "genset" => "Genset",
        "amf" => "AMF",
        "baterai" => "Baterai",
        "rectifier" => "Rectifier",
        "temperatur" => "Temperatur",
        "bbm" => "BBM",
    ];
    public Laporan $laporan;

    public function toggleDone()
    {
        $newDone = !$this->laporan->done;
        $this->laporan->update([
            'done' => $newDone
        ]);

        $this->alert('success', 'Status laporan berhasil disimpan');
    }

    public function mount(Laporan $laporan)
    {
        $this->laporan = $laporan;
    }

    public function render()
    {
        return view('livewire.pages.laporan.show');
    }
}
