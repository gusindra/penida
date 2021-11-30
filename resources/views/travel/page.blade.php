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
                <div class="col-xs-12 col-sm-8 col-md-8 col-md-offset-2">
                    <div class="content-block">
                        <div class="single_post">
                            <div class="post_thumb">
                                <img src="{{$konten->gambar}}" alt="" />
                            </div><!--end post thumb-->
                            
                            <div class="post_desc">
                                {!!$konten->konten!!}
                            </div><!--end post desc-->
                            
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!--end main-content-->
@endsection