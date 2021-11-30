<?php

namespace App\Http\Controllers\Back;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NataController extends BackbaseController
{
    public function index(){ 
        if(Auth::check()){
            return redirect()->to(route('mandala'));
        }

        $content = view('backend.login');
        return view($this->layout, ['content' => $content]);
    }
}
