<?php

namespace App\Livewire\Pages\Tamu;

use App\Models\Tamu;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPhoto extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $photo;
    public $show = false;
    public Tamu $tamu;

    #[On('addPhoto')]
    public function addPhoto(Tamu $tamu)
    {
        $this->show = true;
        $this->tamu = $tamu;
    }

    public function simpan()
    {
        $this->validate([
            'photo.*' => 'required'
        ]);

        foreach ($this->photo as $photo) {
            $photo->store('tamu/'.$this->tamu->id);
        }

        $this->dispatch('reload');
        $this->alert('success', 'Berhasil menambahkan berkas');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->reset([
            'photo',
            'tamu',
            'show'
        ]);
    }

    public function render()
    {
        return view('livewire.pages.tamu.add-photo');
    }
}
