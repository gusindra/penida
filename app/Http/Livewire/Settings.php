<?php

namespace App\Http\Livewire;

use App\Models\Gallery;
use App\Models\Pengaturan;
use Livewire\Component;

class Settings extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        if($this->slug=='app'){
            return view('livewire.settings', [
                'settings' => Pengaturan::where('key', 'app')->get(),
            ]);
        }elseif($this->slug=='social-media'){
            return view('livewire.setting-social-media', [
                'settings' => Pengaturan::where('key', 'sosmed')->get(),
            ]);
        }elseif($this->slug=='gallery'){
            return view('livewire.setting-gallery', [
                'images' => Gallery::all(),
            ]);
        }else{
            return view('livewire.setting-home-page', [
                'settings' => Pengaturan::where('key', 'frontend')->orderBy('judul', 'asc')->get(),
            ]);
        }
    }
}
