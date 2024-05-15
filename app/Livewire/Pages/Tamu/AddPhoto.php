<?php

namespace App\Livewire\Pages\Tamu;

use App\Models\Tamu;
use App\Traits\ImageManipulateTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPhoto extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    use ImageManipulateTrait;
    public $photo = [];
    public $camera;
    public $show = false;
    public Tamu $tamu;

    #[On('addPhoto')]
    public function addPhoto(Tamu $tamu)
    {
        $this->show = true;
        $this->tamu = $tamu;
    }

    public function updatedCamera($camera)
    {
        if ($this->camera) {
            $this->photo[] = $this->camera;
            $this->camera = null;
        }
    }

    public function simpan()
    {
        $this->validate([
            'photo.*' => 'required'
        ]);

        foreach ($this->photo as $photo) {
            $this->manipulate($photo, 'tamu/'.$this->tamu->id);
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
