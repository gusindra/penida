<?php

namespace App\Http\Controllers\Back;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use Illuminate\Support\Facades\File;

class GalleryController extends BackadminController
{

    public function gae(){
        return view('backend.admin.nista.gallery.gae');
    }

    public function store(GalleryRequest $request){
        $request->request->add(['order', "0"]);
        //return $request;
        $hal = Gallery::create($request->except(['_method','_token']));
        $imageName = date("YdmHi").$hal->id.'.'.$request->image->getClientOriginalExtension();

        if ($request->has('image') && $request->image != null) {
            $resizedImage = cloudinary()->upload($request->file('image')->getRealPath(), [
                'folder' => 'penidachoice',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto'
                ]
            ])->getSecurePath();

            $hal->update([
                'url' => $resizedImage
            ]);
            // $request->file('image')->move(
            //     // base_path() . '/../public_html/upload/gallery/', $imageName
            //     base_path() . '/public/upload/gallery/', $imageName
            // );
            // $hal->update([
            //     'url' => 'upload/gallery/'.$imageName
            // ]);
        }


        return redirect()->to(route('edit.gallery', $hal->id));
    }

    public function edit($hal){
        $hal = Gallery::find($hal);
        return view('backend.admin.nista.gallery.edit')->with('hal', $hal);
    }

    public function update(GalleryRequest $request, $hal){
        $hal = Gallery::find($hal);
        $hal->update($request->except(['_method','_token']));

        if($request->has('image') && $request->image != null){
            if($hal->url){
                File::delete($hal->url);
            }
            $imageName = date("YdmHi").$hal->id.'.'.$request->image->getClientOriginalExtension();
            // $request->file('image')->move(
            //     // base_path() . '/../public_html/upload/gallery/', $imageName
            //     base_path() . '/public/upload/gallery/', $imageName
            // );
            // $hal->update([
            //     'url' => 'upload/gallery/'.$imageName
            // ]);
            $resizedImage = cloudinary()->upload($request->file('image')->getRealPath(), [
                'folder' => 'penidachoice',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto'
                ]
            ])->getSecurePath();

            $hal->update([
                'url' => $resizedImage
            ]);

        }
        return redirect()->to(route('edit.gallery', $hal->id));
    }

    public function hapus($id){
        $img = Gallery::find($id);
        if($img->url){
            // File::delete($img->url);
            $url = explode("/", $img->url);
            $gambar = explode(".", end($url));
            cloudinary()->destroy('penidachoice/'.current($gambar));
        }
        Gallery::destroy($id);

        return redirect()->to(route('setting','gallery'));
    }
}
