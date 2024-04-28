<?php

namespace App\Livewire\Forms;

use App\Models\Rectifier;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RectifierForm extends Form
{
    public $laporan_id;
    public $keterangan;
    public $catuan_input;
    public $tegangan_output;
    public $arus_output;
    public $photo;

    public ?Rectifier $rectifier;

    public function setRectifier(Rectifier $rectifier)
    {
        $this->rectifier = $rectifier;

        $this->laporan_id = $rectifier->laporan_id;
        $this->keterangan = $rectifier->keterangan;
        $this->catuan_input = $rectifier->catuan_input;
        $this->tegangan_output = $rectifier->tegangan_output;
        $this->arus_output = $rectifier->arus_output;
    }

    public function store()
    {
        $valid = $this->validate([
            'laporan_id' => 'required',
            'keterangan' => 'required',
            'catuan_input' => 'required',
            'tegangan_output' => 'required',
            'arus_output' => 'required',
        ]);

        if ($this->photo) {
            $valid['photo'] = $this->photo;
        }

        Rectifier::create($valid);
        $this->reset();
    }

    public function update()
    {
        $valid = $this->validate([
            'laporan_id' => 'required',
            'keterangan' => 'required',
            'catuan_input' => 'required',
            'tegangan_output' => 'required',
            'arus_output' => 'required',
        ]);

        if ($this->photo) {
            $valid['photo'] = $this->photo;
        }

        $this->rectifier->update($valid);
        $this->reset();
    }
}
