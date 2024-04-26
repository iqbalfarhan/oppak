<?php

namespace App\Livewire\Pages\Laporan\Temperatur;

use App\Models\Laporan;
use App\Models\Temperatur;
use Livewire\Component;

class Actions extends Component
{
    public Laporan $laporan;
    public $rectifier;
    public $metro;
    public $transmisi;
    public $gpon;

    public function simpan(){
        $valid = $this->validate([
            'laporan' => 'required',
            'rectifier' => 'required',
            'metro' => 'required',
            'transmisi' => 'required',
            'gpon' => 'required',
        ]);

        $valid['laporan_id'] = $this->laporan->id;

        Temperatur::updateOrCreate([
            'laporan_id' => $valid['laporan_id']
        ], $valid);
    }

    public function deleteTemperatur(){
        Temperatur::where('laporan_id', $this->laporan->id)->delete();
    }

    public function mount(Laporan $laporan)
    {
        $this->laporan = $laporan;

        if ($laporan->temperatur) {
            $this->rectifier = $laporan->temperatur->rectifier;
            $this->metro = $laporan->temperatur->metro;
            $this->transmisi = $laporan->temperatur->transmisi;
            $this->gpon = $laporan->temperatur->gpon;
        }

    }

    public function render()
    {
        return view('livewire.pages.laporan.temperatur.actions');
    }
}
