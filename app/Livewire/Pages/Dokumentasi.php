<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Dokumentasi extends Component
{
    public function render()
    {
        return view('livewire.pages.dokumentasi', [
            'content' => file_get_contents(base_path('README.md')),
        ]);
    }
}
