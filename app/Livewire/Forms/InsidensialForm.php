<?php

namespace App\Livewire\Forms;

use App\Models\Insidensial;
use Livewire\Attributes\Validate;
use Livewire\Form;

class InsidensialForm extends Form
{
    public $site_id;
    public $user_id;
    public $kategori;
    public $uraian;
    public $photo;

    public ?Insidensial $insidensial;

    public function setInsidensial(Insidensial $insidensial){
        $this->insidensial = $insidensial;

        $this->site_id = $insidensial->site_id;
        $this->user_id = $insidensial->user_id;
        $this->kategori = $insidensial->kategori;
        $this->uraian = $insidensial->uraian;
    }

    public function store()
    {
        $valid = $this->validate([
            'site_id' => 'required',
            'user_id' => 'required',
            'kategori' => 'required',
            'uraian' => 'required',
            'photo' => '',
        ]);

        Insidensial::create($valid);

        $this->reset();
    }

    public function update()
    {
        $valid = $this->validate([
            'site_id' => 'required',
            'user_id' => 'required',
            'kategori' => 'required',
            'uraian' => 'required',
        ]);

        if ($this->photo) {
            $valid['photo'] = $this->photo;
        }

        $this->insidensial->update($valid);

        $this->reset();
    }
}
