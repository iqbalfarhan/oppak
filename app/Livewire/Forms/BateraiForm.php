<?php

namespace App\Livewire\Forms;

use App\Models\Baterai;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BateraiForm extends Form
{
    public $laporan_id;
    public $photo;
    public $tegangan = [];
    public $elektrolit = "normal";
    public $bj_cell;
    public $bj_pilot_cell_bank = [];

    public ?Baterai $baterai;

    public function setBaterai(Baterai $baterai)
    {
        $this->baterai = $baterai;

        $this->laporan_id = $baterai->laporan_id;
        $this->tegangan = $baterai->tegangan;
        $this->elektrolit = $baterai->elektrolit;
        $this->bj_cell = $baterai->bj_cell;
        $this->bj_pilot_cell_bank = $baterai->bj_pilot_cell_bank;
    }

    public function store()
    {
        $valid = $this->validate([
            'laporan_id' => 'required',
            'tegangan' => 'required',
            'elektrolit' => 'required',
            'bj_cell' => 'required',
            'bj_pilot_cell_bank' => 'required',
        ]);

        if ($this->photo) {
            $valid['photo'] = $this->photo;
        }

        Baterai::create($valid);

        $this->reset();
    }

    public function update()
    {
        $valid = $this->validate([
            'laporan_id' => 'required',
            'tegangan' => 'required',
            'elektrolit' => 'required',
            'bj_cell' => 'required',
            'bj_pilot_cell_bank' => 'required',
        ]);

        if ($this->photo) {
            $valid['photo'] = $this->photo;
        }

        $this->baterai->update($valid);

        $this->reset();
    }
}
