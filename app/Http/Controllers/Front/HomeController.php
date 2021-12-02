<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use App\Models\Halaman;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Models\User;
use App\Notifications\OrderNotification;
use App\Notifications\ContactNotification;
use App\Http\Requests\BookingRequest;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends FrontbaseController
{
    public function index(){
        $logo = Pengaturan::where('judul', 'logo')->first();
        $sosmed = Pengaturan::where('key', 'sosmed')->get();
        $caption = Pengaturan::where('judul', 'caption')->get();
        $services = Pengaturan::where('judul', 'services')->get();
        $app = Pengaturan::where('key', 'app')->get();
        $halaman = Halaman::where('tipe', 'tour')->orderBy('order','asc')->where('status','active')->get();
        $gallery = Gallery::where('halaman_id',null)->get();
        $tag = DB::table('gallerys')->groupBy('tag')->get();
        // return \View::make('frontend.home' , compact('sosmed', 'caption', 'services', 'app'));
        return view('travel.home' , compact('sosmed', 'caption', 'services', 'app', 'halaman', 'gallery','tag', 'logo'));
    }

    public function contact(Request $request){
        $data = $request->all();
        //User::find(1)->notify(new ContactNotification($data));
        //User::find(2)->notify(new ContactNotification($data));
        $to = "sarigardencottages@gmail.com";
        $subject = "Kontak dari ".$request->get('name')." via sarigardenandresto.com";
        $message = $request->get('konten').'<br><br>From: '.$request->get('email');

        $header = "From: ".$request->get('email')."\r\n";
        $header.= "MIME-Version: 1.0\r\n";
        $header.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $header.= "X-Priority: 1\r\n";

        $status = mail($to, $subject, $message, $header);

        if($status)
        {
            return redirect()->to(route('home'));
        } else {
            return '<p>Something went wrong, Please try again!</p>';
        }
    }

    public function booking(BookingRequest $request){
        $halaman = Halaman::find($request->get('tour'));
        $data = $request->all();
        $data['tour'] = $halaman->judul;
        //User::find(1)->notify(new OrderNotification($data));

        $order = Order::create($request->except(['_method','_token']));

        //send email
        $to = "sarigardencottages@gmail.com";
        $subject = "Pesanan dari ".$request->get('name')." via sarigardenandresto.com";
        $message = 'Pemberitahuan pesana dari : <br><br>
                    Name        : '.$request->get('name').'<br>
                    Email       : '.$request->get('email').'<br>
                    Phone       : '.$request->get('phone').'<br>
                    Tanggal     : '.$request->get('date').'<br>
                    Paket Tour  : '.$halaman->judul.'<br>
                    WNI         : '.$request->get('wni').'<br>
                    WNA         : '.$request->get('wna').'<br>
                    Keterangan  : '.$request->get('deskripsi').'<br>
                    <hr>From    : '.$request->get('email');

        $header = "From: ".$request->get('email')."\r\n";
        $header.= "MIME-Version: 1.0\r\n";
        $header.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $header.= "X-Priority: 1\r\n";

        $status = mail($to, $subject, $message, $header);

        if($status)
        {
            return redirect()->route('page', $halaman->slug)->with('message','Pesanan booking Anda sudah terkirim, kami akan segera menghubungi Anda Kembali');
        } else {
            return redirect()->route('page', $halaman->slug)->with('message','Terjadi kesalahan, Silahkan melakukan pemesanan kembali!');
        }

    }

    public function testing(Request $request){
        // return cloud_image_url();
        // $resizedImage = "https://res.cloudinary.com/dionlinein/image/upload/v1638161642/penidachoice/ujuecif3vtoje1oewa5u.jpg";
        // $pieces = explode("/", $resizedImage);
        // return current($pieces);
        return cloudinary()->destroy('penidachoice/cosw96pzp34hitobxxly', ['resource_type' => 'image']);
    }
}
