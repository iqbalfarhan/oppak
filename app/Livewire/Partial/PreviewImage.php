<?php

namespace App\Livewire\Partial;

use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class PreviewImage extends Component
{
    public $url;

    #[On('showPreview')]
    public function showPreview($url){
        $this->url = $url;
    }

    #[On('deletePhoto')]
    public function deletePhoto($url){
        Storage::delete($url);
        $this->dispatch('reload');

        $this->closeModal();
    }

    public function closeModal(){
        $this->url = null;
    }

    public function render()
    {
        return view('livewire.partial.preview-image');
    }
}
