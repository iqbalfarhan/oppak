<?php

namespace App\Livewire\Forms;

use App\Models\Genset;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GensetForm extends Form
{
    public $laporan_id;
    public $keterangan;
    public $ruangan_bersih = true;
    public $engine_bersih = true;
    public $suhu_ruangan;
    public $bbm_utama;
    public $bbm_harian;

    public ?Genset $genset;

    public function setGenset(Genset $genset)
    {
        $this->genset = $genset;

        $this->laporan_id = $genset->laporan_id;
        $this->keterangan = $genset->keterangan;
        $this->ruangan_bersih = $genset->ruangan_bersih;
        $this->engine_bersih = $genset->engine_bersih;
        $this->suhu_ruangan = $genset->suhu_ruangan;
        $this->bbm_utama = $genset->bbm_utama;
        $this->bbm_harian = $genset->bbm_harian;
    }

    public function store()
    {
        $this->validate([
            'laporan_id' => 'required',
            'keterangan' => 'required',
            'ruangan_bersih' => 'required',
            'engine_bersih' => 'required',
            'suhu_ruangan' => 'required',
            'bbm_utama' => 'required',
            'bbm_harian' => 'required',
        ]);

        Genset::create($this->all());
        $this->reset();
    }

    public function update()
    {
        $this->validate([
            'laporan_id' => 'required',
            'keterangan' => 'required',
            'ruangan_bersih' => 'required',
            'engine_bersih' => 'required',
            'suhu_ruangan' => 'required',
            'bbm_utama' => 'required',
            'bbm_harian' => 'required',
        ]);

        $this->genset->update($this->all());
        $this->reset();
    }
}
