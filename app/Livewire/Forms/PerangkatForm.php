<?php

namespace App\Livewire\Forms;

use App\Models\Perangkat;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PerangkatForm extends Form
{
    public $name;
    public $durasi_pln;
    public $durasi_solar_cell;

    public ?Perangkat $perangkat;

    public function setPerangkat(Perangkat $perangkat)
    {
        $this->perangkat = $perangkat;
        $this->name = $perangkat->name;
        $this->durasi_pln = $perangkat->durasi_pln;
        $this->durasi_solar_cell = $perangkat->durasi_solar_cell;
    }

    public function store()
    {
        $valid = $this->validate([
            'name' => 'required',
            'durasi_pln' => 'required',
            'durasi_solar_cell' => 'required',
        ]);

        Perangkat::create($valid);

        $this->reset();
    }

    public function update()
    {
        $valid = $this->validate([
            'name' => 'required',
            'durasi_pln' => 'required',
            'durasi_solar_cell' => 'required',
        ]);

        $this->perangkat->update($valid);

        $this->reset();
    }
}
