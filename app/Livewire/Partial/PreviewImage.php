<?php

namespace App\Livewire\Partial;

use Livewire\Attributes\On;
use Livewire\Component;

class PreviewImage extends Component
{
    public $url;

    #[On('showPreview')]
    public function showPreview($url){
        $this->url = $url;
    }

    public function closeModal(){
        $this->url = null;
    }

    public function render()
    {
        return view('livewire.partial.preview-image');
    }
}
