<?php

namespace App\Livewire\Pages;

use App\Models\Site;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.home', [
            'witels' => Site::$witels
        ]);
    }
}
