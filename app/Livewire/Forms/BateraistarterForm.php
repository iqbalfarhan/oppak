<?php

namespace App\Livewire\Forms;

use App\Models\Bateraistarter;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BateraistarterForm extends Form
{
    public $genset_id;
    public $tegangan;
    public $bj_cell;
    public $bj_pilot_cell;
    public $elektrolit;
    public $kencang = 1;

    public ?Bateraistarter $bateraistarter;

    public function setBateraistarter(Bateraistarter $bateraistarter)
    {
        $this->bateraistarter = $bateraistarter;

        $this->genset_id = $bateraistarter->genset_id;
        $this->tegangan = $bateraistarter->tegangan;
        $this->bj_cell = $bateraistarter->bj_cell;
        $this->bj_pilot_cell = $bateraistarter->bj_pilot_cell;
        $this->elektrolit = $bateraistarter->elektrolit;
        $this->kencang = $bateraistarter->kencang;
    }

    public function store()
    {
        $valid = $this->validate([
            'genset_id' => 'required',
            'tegangan' => 'required',
            'bj_cell' => 'required',
            'bj_pilot_cell' => 'required',
            'elektrolit' => 'required',
            'kencang' => 'required',
        ]);

        Bateraistarter::create($valid);
        $this->reset();
    }

    public function update()
    {
        $valid = $this->validate([
            'genset_id' => 'required',
            'tegangan' => 'required',
            'bj_cell' => 'required',
            'bj_pilot_cell' => 'required',
            'elektrolit' => 'required',
            'kencang' => 'required',
        ]);

        $this->bateraistarter->update($valid);
        $this->reset();
    }
}
