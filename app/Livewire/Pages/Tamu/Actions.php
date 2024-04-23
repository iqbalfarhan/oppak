<?php

namespace App\Livewire\Pages\Tamu;

use App\Models\Tamu;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Tamu $tamu;

    #[On('previewTamu')]
    public function previewTamu(Tamu $tamu)
    {
        $this->show = true;
        $this->tamu = $tamu;
    }

    #[On('deleteTamu')]
    public function deleteTamu(Tamu $tamu)
    {
        $tamu->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Berhasil menghapus tamu');
    }

    public function closeModal(){
        $this->reset();
    }

    #[On('exitTamu')]
    public function exitTamu(Tamu $tamu)
    {
        $tamu->update([
            'keluar' => now(),
        ]);

        $this->dispatch('reload');
        $this->alert('success', 'Berhasil mengubah status tamu');
    }


    public function render()
    {
        return view('livewire.pages.tamu.actions');
    }
}
