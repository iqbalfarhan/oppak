<?php

namespace App\Livewire\Pages;

use App\Models\Lokasi;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.home', [
            'user' => auth()->user(),
            'lokasis' => Lokasi::whereIn('witel', config('oppak.witels'))->get()->groupBy('witel')
        ]);
    }
}
