<?php

namespace App\Livewire\Forms;

use App\Models\Amf;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AmfForm extends Form
{
    public $laporan_id;
    public $ruangan_bersih = 1;
    public $engine_bersih = 1;
    public $tegangan = [];
    public $arus = [];
    public $kwh;
    public $jam_jalan_genset;
    public $photo;

    public ?Amf $amf;

    public function setAmf(Amf $amf){
        $this->amf = $amf;

        $this->laporan_id = $amf->laporan_id;
        $this->ruangan_bersih = $amf->ruangan_bersih;
        $this->engine_bersih = $amf->engine_bersih;
        $this->tegangan = $amf->tegangan;
        $this->arus = $amf->arus;
        $this->kwh = $amf->kwh;
        $this->jam_jalan_genset = $amf->jam_jalan_genset;
    }

    public function store(){
        $valid = $this->validate([
            'laporan_id' => 'required',
            'ruangan_bersih' => 'required',
            'engine_bersih' => 'required',
            'tegangan.R-S' => 'required',
            'tegangan.S-T' => 'required',
            'tegangan.T-R' => 'required',
            'tegangan.R-N' => 'required',
            'tegangan.S-N' => 'required',
            'tegangan.T-N' => 'required',
            'arus.R' => 'required',
            'arus.S' => 'required',
            'arus.T' => 'required',
            'kwh' => '',
            'jam_jalan_genset' => '',
        ]);

        if ($this->photo) {
            $valid['photo'] = $this->photo;
        }

        Amf::create($valid);
    }

    public function update(){
        $valid = $this->validate([
            'laporan_id' => 'required',
            'ruangan_bersih' => 'required',
            'engine_bersih' => 'required',
            'tegangan.R-S' => 'required',
            'tegangan.S-T' => 'required',
            'tegangan.T-R' => 'required',
            'tegangan.R-N' => 'required',
            'tegangan.S-N' => 'required',
            'tegangan.T-N' => 'required',
            'arus.R' => 'required',
            'arus.S' => 'required',
            'arus.T' => 'required',
            'kwh' => '',
            'jam_jalan_genset' => '',
        ]);

        if ($this->photo) {
            $valid['photo'] = $this->photo;
        }

        $this->amf->update($valid);
    }
}
