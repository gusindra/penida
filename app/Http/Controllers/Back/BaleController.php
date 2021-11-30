<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class BaleController extends BackadminController
{

    public function addOrupdate(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if ($key!='_method' && $key!='_token' && !empty($value)) {
                DB::transaction(function () use ($key, $value) {
                    DB::table('pengaturan')->where('id', $key)->update(['konten' => $value]);
                });
            }
        }

        return redirect()->back()->with('message','Sukses mengubah pengaturan');
    }

    public function update(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if ($key!='_method' && $key!='_token' && !empty($value)) {
                DB::transaction(function () use ($key, $value) {
                    DB::table('pengaturan')->where('id', $key)->update(['konten' => $value]);
                });
            }
        }

        return redirect()->back()->with('message','Sukses mengubah pengaturan');
    }

    public function updatecaption(Request $request)
    {
        // return $request->all();
        foreach ($request->get('judul') as $key => $value) {
            if ($key!='_method' && $key!='_token' && !empty($value)) {
                DB::transaction(function () use ($key, $value) {
                    DB::table('pengaturan')->where('id', $key)->update(['konten' => $value]);
                });
            }
        }
        foreach ($request->get('deskripsi') as $key => $value) {
            if ($key!='_method' && $key!='_token' && !empty($value)) {
                DB::transaction(function () use ($key, $value) {
                    DB::table('pengaturan')->where('id', $key)->update(['deskripsi' => $value]);
                });
            }
        }

        return redirect()->back()->with('message','Sukses mengubah pengaturan');
    }

    public function updatelogo(Request $request)
    {
        $pengaturan = Pengaturan::where('judul', 'logo')->first();
        // return $request->all();
        if($request->has('image') && $request->image != null){
            if($pengaturan->konten){
                // File::delete($pengaturan->konten);
                $url = explode("/", $pengaturan->konten);
                $gambar = explode(".", end($url));
                cloudinary()->destroy('penidachoice/'.current($gambar));
            }
            // $imageName = 'logo.png';
            // $request->file('image')->move(
            //     // base_path() . '/../public_html/img/', $imageName
            //     base_path() . '/public/img/', $imageName
            // );
            $resizedImage = cloudinary()->upload($request->file('image')->getRealPath(), [
                'folder' => 'penidachoice',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto'
                ]
            ])->getSecurePath();

            $pengaturan->update([
                'konten' => $resizedImage
            ]);
        }

        return redirect()->back()->with('message','Sukses mengubah pengaturan');
    }


    public function addbanner(Request $request)
    {
        // return $request->all();
        foreach ($request->get('judul') as $key => $value) {
            if ($key!='_method' && $key!='_token' && !empty($value)) {
                DB::transaction(function () use ($key, $value) {
                    DB::table('pengaturan')->where('id', $key)->update(['konten' => $value]);
                });
            }
        }
        foreach ($request->get('deskripsi') as $key => $value) {
            if ($key!='_method' && $key!='_token' && !empty($value)) {
                DB::transaction(function () use ($key, $value) {
                    DB::table('pengaturan')->where('id', $key)->update(['deskripsi' => $value]);
                });
            }
        }

        return redirect()->back()->with('message','Sukses mengubah pengaturan');
    }

    public function updatebanner(Request $request)
    {
        // return $request->all();
        foreach ($request->get('judul') as $key => $value) {
            if ($key!='_method' && $key!='_token' && !empty($value)) {
                DB::transaction(function () use ($key, $value) {
                    DB::table('pengaturan')->where('id', $key)->update(['konten' => $value]);
                });
            }
        }
        foreach ($request->get('deskripsi') as $key => $value) {
            if ($key!='_method' && $key!='_token' && !empty($value)) {
                DB::transaction(function () use ($key, $value) {
                    DB::table('pengaturan')->where('id', $key)->update(['deskripsi' => $value]);
                });
            }
        }

        return redirect()->back()->with('message','Sukses mengubah pengaturan');
    }

    public function deletebanner(Request $request)
    {
        // return $request->id;
        $pengaturan = Pengaturan::find($request->id);
        if($pengaturan->media){
            // File::delete($pengaturan->media);
            $url = explode("/", $pengaturan->media);
            $gambar = explode(".", end($url));
            cloudinary()->destroy('penidachoice/'.current($gambar));
        }

        Pengaturan::destroy($request->id);

        return redirect()->back()->with('message','Sukses delete banner');
    }
}
