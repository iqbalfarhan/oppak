<?php

namespace App\Livewire\Forms;

use App\Models\Tamu;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TamuForm extends Form
{
    public $site_id;
    public $nama;
    public $perusahaan;
    public $keperluan;
    public $tipe_identitas = "ktp";
    public $nomor_identitas;
    public $notelp = "08";
    public $masuk;
    public $keluar;

    public ?Tamu $tamu;

    public function setTamu(Tamu $tamu)
    {
        $this->tamu = $tamu;

        $this->site_id = $tamu->site_id;
        $this->nama = $tamu->nama;
        $this->perusahaan = $tamu->perusahaan;
        $this->keperluan = $tamu->keperluan;
        $this->tipe_identitas = $tamu->tipe_identitas;
        $this->nomor_identitas = $tamu->nomor_identitas;
        $this->notelp = $tamu->notelp;
        $this->masuk = $tamu->masuk;
        $this->keluar = $tamu->keluar;
    }

    public function store()
    {
        $valid = $this->validate([
            'site_id' => 'required',
            'nama' => 'required',
            'perusahaan' => 'required',
            'keperluan' => 'required',
            'tipe_identitas' => 'required',
            'nomor_identitas' => 'required',
            'notelp' => 'required',
            'masuk' => 'required',
            'keluar' => '',
        ]);

        Tamu::create($valid);
        $this->reset();
    }

    public function update()
    {
        $valid = $this->validate([
            'site_id' => 'required',
            'nama' => 'required',
            'perusahaan' => 'required',
            'keperluan' => 'required',
            'tipe_identitas' => 'required',
            'nomor_identitas' => 'required',
            'notelp' => 'required',
            'masuk' => 'required',
            'keluar' => '',
        ]);

        $this->tamu->update($valid);
        $this->reset();
    }
}
