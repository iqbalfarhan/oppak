<?php

namespace App\Livewire\Pages\Laporan\Bbm;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $photo;

    public function render()
    {
        return view('livewire.pages.laporan.bbm.actions');
    }
}
