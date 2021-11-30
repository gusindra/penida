<?php

namespace App\Http\Controllers\Front;

use App\Models\Halaman;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends FrontbaseController
{
    public function detail($slug){
        if($slug=='dashboard'){
            return redirect()->to(route('dashboard'));
        }
        $logo = Pengaturan::where('judul', 'logo')->first();
        $app = Pengaturan::where('key', 'app')->get();
        $sosmed = Pengaturan::where('key', 'sosmed')->get();
        $konten = Halaman::where('slug', $slug)->first();
        $halaman = Halaman::where('slug', '!=', $slug)->where('tipe', 'tour')->get();
        $tour = Halaman::where('tipe', 'tour')->get();

        if(@$konten->tipe=='tour'){
            return view('travel.detail' , compact('konten', 'sosmed', 'halaman', 'tour', 'app', 'logo'));
        }else{

            return view('travel.page' , compact('konten', 'sosmed', 'halaman', 'tour', 'app', 'logo'));

        }

    }

}

