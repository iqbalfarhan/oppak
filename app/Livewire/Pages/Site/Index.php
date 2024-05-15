<?php

namespace App\Livewire\Pages\Site;

use App\Models\Site;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $search;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.site.index', [
            'datas' => Site::when($this->search, function($site){
                $site->where('witel', 'like', "%".$this->search."%")
                ->orWhere('name', 'like', "%".$this->search."%");
            })->withCount('users')->get()
        ]);
    }
}
