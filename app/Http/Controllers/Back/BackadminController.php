<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use View;

class BackadminController extends Controller
{
    public $layout = 'layouts.backend.admin.main';
    public $upload_base_path;
    public $user;

    public function __construct()
    {
        $this->upload_base_path = public_path().'/uploads/';
        View::share ( 'num_order', Order::count() );
        //view()->share('user', $this->user);

    }
}
