<?php

namespace App\Livewire\Forms;

use App\Models\Site;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SiteForm extends Form
{
    public $name;
    public $witel;
    public $listrik = "pln";
    public ?Site $site;

    public function setSite(Site $site)
    {
        $this->site = $site;

        $this->name = $site->name;
        $this->witel = $site->witel;
        $this->listrik = $site->listrik;
    }

    public function store()
    {
        $valid = $this->validate([
            'name' => 'required',
            'witel' => 'required',
            'listrik' => 'required',
        ]);

        Site::create($valid);
        $this->reset();
    }

    public function update()
    {
        $valid = $this->validate([
            'name' => 'required',
            'witel' => 'required',
            'listrik' => 'required',
        ]);

        $this->site->update($valid);
        $this->reset();
    }
}
