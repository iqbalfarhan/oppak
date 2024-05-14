<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\File;
use Livewire\Component;

class Dokumentasi extends Component
{
    public string $file;

    protected function queryString()
    {
        return [
            'file' => [
                'as' => 'q',
            ],
        ];
    }

    public function mount()
    {
        $this->file = $this->file ?? $this->getDefaultFile();
    }

    public function setFile($path)
    {
        $this->file = $path;
    }

    private function getDefaultFile()
    {
        $files = File::files(resource_path("/views/markdowns/"));
        return count($files) > 0 ? $files[0] : null;
    }

    public function render()
    {
        $files = File::files(resource_path("/views/markdowns/"));

        return view('livewire.pages.dokumentasi', [
            'files' => $files,
            'content' => $this->file ? file_get_contents($this->file) : ""
        ]);
    }
}
