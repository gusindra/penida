<?php

namespace App\Http\Livewire;

use App\Models\Gallery;
use Livewire\Component;

class SettingGallery extends Component
{
    public function render()
    {
        return view('livewire.setting-gallery', [
            'images' => Gallery::all(),
        ]);
    }
}
