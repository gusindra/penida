<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackbaseController extends Controller
{
    public $layout = 'layouts.backend.login.main';
    public $upload_base_path;
    public $user;

    public function __construct()
    {
        $this->upload_base_path = public_path().'/uploads/';

        //view()->share('user', $this->user);

    }
}
