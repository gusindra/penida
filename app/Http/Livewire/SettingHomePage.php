<?php

namespace App\Http\Livewire;

use App\Models\Pengaturan;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SettingHomePage extends Component
{
    use WithFileUploads;

    public $selected_set;
    public $caption;
    public $description;
    public $image;
    public $modalAddVisible = false;
    public $modalUpdateVisible = false;


    public function actionAddModal()
    {

        $this->resetForm();
        $this->modalAddVisible = true;
    }

    public function actionUpdateModal($id)
    {
        $this->resetForm();
        $this->selected_set = Pengaturan::find($id);
        $this->caption = $this->selected_set->konten;
        $this->description = $this->selected_set->deskripsi;
        $this->modalUpdateVisible = true;
    }

    public function resetForm()
    {
        $this->image = null;
        $this->selected_set = null;
        $this->caption = null;
        $this->description = null;
    }

    public function create()
    {
        $this->validate([
            'caption' => 'required',
            'description' => 'required',
            'image' => 'image|max:2048', // 2MB Max
        ]);

        $data = Pengaturan::create([
            'key'       => 'frontend',
            'judul'     => 'caption',
            'konten'    => $this->caption,
            'deskripsi' => $this->description,
            'media'     => ''
        ]);

        if($this->image){
            $resizedImage = cloudinary()->upload($this->image->getRealPath(), [
                'folder' => 'penidachoice',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto'
                ]
            ])->getSecurePath();

            $data->update([
                'media' => $resizedImage
            ]);
            // $imageName = date("YdmHi").'.'.$this->image->getClientOriginalExtension();
            // $this->image->storeAs('/img/banner/', $imageName, $disk = 'web');
        }

        $this->modalAddVisible = false;
        $this->resetForm();
        $this->emit('added');
    }

    public function update()
    {
        $this->validate([
            'caption' => 'required',
            'description' => 'required',
            'image' => 'image|max:2048', // 2MB Max
        ]);

        if($this->selected_set->media){
            // File::delete($this->selected_set->konten);
            $url = explode("/", $this->selected_set->media);
            $gambar = explode(".", end($url));
            cloudinary()->destroy('penidachoice/'.current($gambar));
        }
        // $imageName = date("YdmHi").$this->selected_set->id.'.'.$this->image->getClientOriginalExtension();

        // $this->image->storeAs('/img/banner/', $imageName, $disk = 'web');

        $this->selected_set->update([
            'key'       => 'frontend',
            'judul'     => 'caption',
            'konten'    => $this->caption,
            'deskripsi' => $this->description,
            'media'     => ''
        ]);

        $resizedImage = cloudinary()->upload($this->image->getRealPath(), [
            'folder' => 'penidachoice',
            'transformation' => [
                'quality' => 'auto',
                'fetch_format' => 'auto'
            ]
        ])->getSecurePath();

        $this->selected_set->update([
            'media' => $resizedImage
        ]);

        $this->modalUpdateVisible = false;
        $this->resetForm();
        $this->emit('updated');
    }

    protected function cleanupOldUploads()
    {

        $storage = Storage::disk('local');

        foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
            // On busy websites, this cleanup code can run in multiple threads causing part of the output
            // of allFiles() to have already been deleted by another thread.
            if (! $storage->exists($filePathname)) continue;

            $yesterdaysStamp = now()->subMinutes(5)->timestamp;
            if ($yesterdaysStamp > $storage->lastModified($filePathname)) {
                $storage->delete($filePathname);
            }
        }
    }

    public function render()
    {
        return view('livewire.setting-home-page', [
            'settings' => Pengaturan::where('key', 'frontend')->orderBy('judul', 'asc')->get(),
        ]);
    }
}
