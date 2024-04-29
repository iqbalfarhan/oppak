<?php

namespace App\Livewire\Forms;

use App\Models\Pergantian;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PergantianForm extends Form
{
    public $site_id;
    public $perangkat_id;
    public $user_id;
    public $tanggal;
    public $keterangan;
    public $photo;

    public ?Pergantian $pergantian;

    public function setPergantian(Pergantian $pergantian)
    {
        $this->pergantian = $pergantian;

        $this->site_id = $pergantian->site_id;
        $this->perangkat_id = $pergantian->perangkat_id;
        $this->user_id = $pergantian->user_id;
        $this->tanggal = $pergantian->tanggal->format('Y-m-d');
        $this->keterangan = $pergantian->keterangan;
    }

    public function store()
    {
        $valid = $this->validate([
            'site_id' => 'required',
            'perangkat_id' => 'required',
            'user_id' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        if ($this->photo) {
            $valid['photo'] = $this->photo;
        }

        Pergantian::create($valid);
        $this->reset();
    }

    public function update()
    {
        $valid = $this->validate([
            'site_id' => 'required',
            'perangkat_id' => 'required',
            'user_id' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        if ($this->photo) {
            $valid['photo'] = $this->photo;
        }

        $this->pergantian->update($valid);
        $this->reset();
    }
}
