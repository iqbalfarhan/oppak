<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\File;
use Livewire\Component;

class Dokumentasi extends Component
{
    public $no = 1;
    public string $file = "aplikasi oppak";

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
        $this->file = $this->file ?? "aplikasi oppak";
    }

    public function setFile($path)
    {
        $this->file = $path;
    }

    public function render()
    {
        return view('livewire.pages.dokumentasi', [
            'files' => [
                'home' => 'aplikasi oppak',
                'tamu.index' => 'buku tamu',
                'insidensial.index' => 'laporan insidensial',
                'laporan.index' => 'laporan rutin',
                'site.index' => 'mengatur site',
                'user.index' => 'mengatur user',
                'pergantian.index' => 'pergantian rutin',
                'ticket.index' => 'ticketing',
            ],
            'content' => $this->file ? file_get_contents(resource_path("/views/markdowns/{$this->file}.md")) : ""
        ]);
    }
}
