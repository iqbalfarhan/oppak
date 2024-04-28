<?php

namespace App\Livewire\Pages\Pergantian;

use App\Models\Site;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $witel;

    public function render()
    {
        return view('livewire.pages.pergantian.index', [
            'sites' => Site::when($this->witel, function($site){
                $site->where('witel', $this->witel);
            })->orderBy('witel')->get()
        ]);
    }
}
