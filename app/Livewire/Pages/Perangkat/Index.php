<?php

namespace App\Livewire\Pages\Perangkat;

use App\Models\Perangkat;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $show = false;
    public $no = 1;
    protected $listeners = ['reload', '$refresh'];

    #[On('showPerangkat')]
    public function showPerangkat()
    {
        $this->show = true;
    }

    public function closePerangkat()
    {
        $this->show = false;
        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.pages.perangkat.index', [
            'datas' => Perangkat::get(),
        ]);
    }
}
