<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UmahController extends BackadminController
{
    public function index(){ 
         $content = view('backend.admin.nista.index');
         return view($this->layout, ['content' => $content]);
    }
}
