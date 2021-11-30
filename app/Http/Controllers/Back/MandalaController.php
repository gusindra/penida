<?php

namespace App\Http\Controllers\Back;

use Analytics;
use App\Halaman;
use App\Order;
use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class MandalaController extends BackadminController
{
    public function index(){ 
        //retrieve visitors and pageview data for the current day and the last seven days
        $week = Analytics::fetchVisitorsAndPageViews(Period::days(7));
        $month = Analytics::fetchVisitorsAndPageViews(Period::days(30));
        $hal = Halaman::orderBy('updated_at', 'desc')->take(3)->get();

        $dayAgo = 7; // where here there is your calculation for now How many days
        $order[1] = Order::where("created_at", '=', Carbon::now()->subDays($dayAgo-1))->count();
        $order[2] = Order::where("created_at", '=', Carbon::now()->subDays($dayAgo-2))->count();
        $order[3] = Order::where("created_at", '=', Carbon::now()->subDays($dayAgo-3))->count();
        $order[4] = Order::where("created_at", '=', Carbon::now()->subDays($dayAgo-4))->count();
        $order[5] = Order::where("created_at", '=', Carbon::now()->subDays($dayAgo-5))->count();
        $order[6] = Order::where("created_at", '=', Carbon::now()->subDays($dayAgo-6))->count();
        $order[7] = Order::where("created_at", '=', Carbon::now()->subDays($dayAgo-7))->count();

        $order['all'] = Order::count();

        $content = view('backend.admin.nista.index');
        return \View::make('backend.admin.nista.index')->with('week', $week)->with('month', $month)->with('hal', $hal)->with('order', $order);
    }
}
