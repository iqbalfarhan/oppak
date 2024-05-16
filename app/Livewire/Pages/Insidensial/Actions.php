<?php

namespace App\Livewire\Pages\Insidensial;

use App\Livewire\Forms\InsidensialForm;
use App\Models\Insidensial;
use App\Models\Site;
use App\Traits\ImageManipulateTrait;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use LivewireAlert, WithFileUploads, ImageManipulateTrait;
    public $photo;
    public $camera;
    public $oldPhoto;
    public $show = false;
    public InsidensialForm $form;

    #[On('createInsidensial')]
    public function createInsidensial()
    {
        $this->show = true;
    }

    #[On('editInsidensial')]
    public function editInsidensial(Insidensial $insidensial)
    {
        $this->form->setInsidensial($insidensial);
        $this->oldPhoto = $insidensial->image;
        $this->show = true;
    }

    #[On('deleteInsidensial')]
    public function deleteInsidensial(Insidensial $insidensial)
    {
        $insidensial->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Insidensial deleted successfully');
    }

    public function updatedCamera($camera){
        $this->photo = $camera;
        $this->camera = null;
    }

    public function simpan()
    {
        if (isset($this->photo)) {
            $image = $this->manipulate($this->photo, folder:'insidensial');
            $this->form->photo = $image;
        }

        if (isset($this->form->insidensial)) {
            $this->form->update();
        }
        else{
            $this->form->site_id = Site::first()->id;
            $this->form->user_id = auth()->id();
            $this->form->store();
        }

        $this->dispatch('reload');
        $this->alert('success', 'Insidensial updated successfully');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->show = false;
        $this->photo = null;
    }

    public function render()
    {
        return view('livewire.pages.insidensial.actions', [
            'kategories' => Insidensial::$kategories,
        ]);
    }
}
