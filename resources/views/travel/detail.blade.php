@extends('layouts.travel.main', ['sosmed' => $sosmed, 'app' => $app])
@section('content')

    <!-- Page Title-->
    <section id="page-title" class="parallax" data-stellar-background-ratio="0.5" style="background-image: url(img/single-tour/bg.jpg);">
        <div class="title-info">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title text-center">
                            <h1>{{$konten->judul}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end title-info-->
    </section>
    <!--end page-title-->

    <!-- Main Content -->
    <section class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8">
                    <div class="content-block">
                        <div class="single_post">
                            <div class="post_thumb">
                                <img src="{{$konten->gambar? cloud_image_url($konten->gambar, 'res') : url('upload/'.$konten->gambar.'.jpg')}}" alt="{{$konten->judul}}" />
                            </div><!--end post thumb-->

                            <div class="post_desc">
                                {!!$konten->konten!!}

                            </div><!--end post desc-->

                        </div>

                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="sidebar">
                        <div class="sidebar-item">
                            <h3>Booking Sekarang</h3>
                            <p><small>Silahkan isi form dibawah ini untuk melakukan pemesanan</small></p>
                            @if (session('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @include('partials.messages')
                            <form method="POST" action="{{ route('booking') }}">
                                <div class="form-group">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                        <input value="{{old('name')}}" id="name" type="text" class="form-control" placeholder="Name" name="name">

                                    </div>

                                </div>



                                <div class="form-group">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

                                        <input value="{{old('email')}}" id="email" type="text" class="form-control" placeholder="Email Address" name="email">

                                    </div>

                                </div>



                                <div class="form-group">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                        <input value="{{old('phone')}}" id="phone"  type="text" class="form-control" placeholder="Phone" name="phone">

                                    </div>

                                </div>



                                <div class="form-group">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                        <input value="{{old('date')}}" id="date" type="text" class="form-control date_pic" placeholder="" name="date" title="Tanggal tour">

                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="">

                                        <label>Paket Tour</label>

                                       <select name="tour" class="form-control">

                                           @foreach($tour as $t)

                                            <option {{$konten->id==$t->id?'selected':''}} value="{{$t->id}}">{{$t->judul}}</option>

                                           @endforeach

                                       </select>

                                    </div>

                                </div>

                                <div class="form-group ">

                                    <div class="col-md-6">

                                        <div class="group ">

                                            <label>WNI</label>

                                            <input value="{{old('wni', 0)}}" id="wni" type="number" class="form-control" placeholder="0" min="0" name="wni" title="Jumlah turis lokal">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="input ">

                                            <label>WNA</label>

                                            <input value="{{old('wna', 0)}}" id="wna" type="number" class="form-control" placeholder="0" min="0" name="wna" title="Jumlah turis asing">

                                        </div>

                                    </div>

                                </div>

                                <br><br><hr>

                                 <div class="form-group">

                                    <div class="">

                                        <label>Keterangan</label>

                                        <textarea name="deskripsi" class="form-control">{{old('deskripsi')}}</textarea>

                                    </div>

                                </div>

                                <div class="text-center">

                                    <button type="submit" class="booking btn btn-primary">Book Sekarang</button>

                                </div>



                            </form>
                        </div><!--end sidebar-item-->


                    </div><!--end sidebar-->
                </div>

            </div>
        </div>
    </section>
    <!--end main-content-->

    <!-- Deals and Discounts -->
    <section id="deals-discounts" class="inverse">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title text-center">
                        <h1>Related Tours</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="owl-carousel" id="deals-discounts-carousel">
                        @foreach($halaman as $h)
                        <div class="tour-item">
                            <div class="thumb">
                                <img src="{{$halaman->gambar? cloud_image_url($h->gambar, 'res') : url('upload/'.$halaman->id.'.jpg')}}" alt="{{$halaman->judul}}" />
                            </div>

                            <div class="discount-info">
                                <h5>{{$h->judul}}</h5>
                                <a href="{{route('page', $h->slug)}}">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
                            </div>

                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>

    </section>
    <!--end deals-discounts-->
@endsection
