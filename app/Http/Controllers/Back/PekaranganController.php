<?php

namespace App\Http\Controllers\Back;

use App\Models\Halaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HalamanRequest;

class PekaranganController extends BackadminController
{
    public function index(){
        $hal = Halaman::orderBy('tipe', 'desc')->orderBy('order','asc')->get();
        return view('backend.admin.nista.karang.karang')->with('hal', $hal);
    }

    public function gae(){
        return view('backend.admin.nista.karang.gae');
    }

    public function store(HalamanRequest $request){
        $request->request->add(['order', "0"]);
        //return $request;
        $hal = Halaman::create($request->except(['_method','_token']));
        $imageName = $hal->id . '.jpg';

        if ($request->has('image') && $request->image != null) {
            $resizedImage = cloudinary()->upload($request->file('image')->getRealPath(), [
                'folder' => 'penidachoice',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto'
                ]
            ])->getSecurePath();

            $hal->update([
                'gambar' => $resizedImage
            ]);
            // $request->file('image')->move(
            //     // base_path() . '/../public_html/upload/', $imageName
            //     base_path() . '/public/upload/', $imageName
            // );
        }


        return redirect()->to(route('edit.karang', $hal->id));
    }

    public function edit($hal){
        $hal = Halaman::find($hal);
        return view('backend.admin.nista.karang.edit')->with('hal', $hal);
    }

    public function update(HalamanRequest $request, $hal){
        $hal = Halaman::find($hal);

        $hal->update($request->except(['_method','_token']));
        $imageName = $hal->id . '.jpg';

        if($request->has('image') && $request->image != null){
            // return base_path() . '/../public/upload/'. $imageName;
            $resizedImage = cloudinary()->upload($request->file('image')->getRealPath(), [
                'folder' => 'penidachoice',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto'
                ]
            ])->getSecurePath();

            // dd($resizedImage); //"https://res.cloudinary.com/dionlinein/image/upload/v1638161642/penidachoice/ujuecif3vtoje1oewa5u.jpg"
            // $resizedImage = "https://res.cloudinary.com/dionlinein/image/upload/v1638161642/penidachoice/ujuecif3vtoje1oewa5u.jpg";
            // $pieces = explode("/", $resizedImage);
            // save  https://res.cloudinary.com/dionlinein/image/upload/q_auto/penidachoice/ujuecif3vtoje1oewa5u.jpg

            // $request->file('image')->move(
            //     // base_path() . '/../public_html/upload/', $imageName
            //     base_path() . '/public/upload/', $imageName
            // );

            $hal->update([
                'gambar' => $resizedImage
            ]);
        }
        return redirect()->to(route('edit.karang', $hal->id));
    }

    public function hapus($id){
        $halaman = Halaman::find($id);
        if($halaman->gambar){
            $url = explode("/", $halaman->gambar);
            $gambar = explode(".", end($url));
            cloudinary()->destroy('penidachoice/'.current($gambar));
        }
        Halaman::destroy($id);
        return redirect()->to(route('karang'));
    }
}
