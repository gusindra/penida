<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontbaseController extends Controller
{
    public $layout = 'layouts.travel.main';
    public $upload_base_path;
    public $user;

    public function __construct()
    {
        $this->upload_base_path = public_path().'/uploads/';

        //view()->share('user', $this->user);

    }
}
