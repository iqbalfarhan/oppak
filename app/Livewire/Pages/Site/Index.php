<?php

namespace App\Livewire\Pages\Site;

use App\Models\Site;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.site.index', [
            'datas' => Site::get()
        ]);
    }
}
