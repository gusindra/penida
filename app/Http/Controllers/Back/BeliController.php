<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class BeliController extends BackadminController
{
    public function index(){ 
        $list = Order::all();
        return \View::make('backend.admin.nista.beli.beli')->with('list', $list);
    }

    public function show(Order $order){ 
        $list = Order::where('id','!=',$order->id)->get();
        return \View::make('backend.admin.nista.beli.beli')->with('list', $list)->with('order', $order);
    }

    public function hapus($id){
        Order::destroy($id);

        return redirect()->to(route('meli'));
    }
}
