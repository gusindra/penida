@extends('layouts.travel.main', ['sosmed' => $sosmed, 'app' => $app])
@section('content')


    <!-- Banner Section -->
	<div id="banner" class="carousel slide carousel-fade" data-ride="carousel" data-pause="false">

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
            @foreach($caption as $k => $c)
			<div class="item {{$k==0?'active':''}}" style="background-image:url({{strpos($c->media, 'http') !== false ? cloud_image_url($c->media, 'res') : $c->media}});">
				<div class="caption-info">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 col-md-8 col-md-offset-2">
								<div class="caption-info-inner text-center">
									<h1 class="animated fadeInDown">{{$c->konten}}</h1>
									<p class="animated fadeInUp">{{$c->deskripsi}}</p>
									<!-- <a href="#packages" class="animated fadeInUp btn btn-primary page-scroll">Read More</a> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach

		</div><!--end carousel-inner-->


		<!-- Controls -->
		<a class="control left" style=" border: none; " href="#banner" data-slide="prev"><i class="fa fa-angle-left"></i></a>
		<a class="right control" style=" border: none; " href="#banner" data-slide="next"><i class="fa fa-angle-right"></i></a>
	</div>
	<!--end Banner-->

	<!-- Services Section -->
	<section id="services">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="section-title text-center">
						<h1>Kenapa memilih Travelais</h1>
					</div>
				</div>
			</div>
			<div class="row">
                @foreach($services as $s => $ser)
                    <div class="col-xs-6 col-md-3">
                        <div class="service-list text-center wow fadeInUp">
                            <!--<img src="{{url('img/service/mobil.png')}}" alt="Kami dampingi anda sejak mendarat di Bali" class="img-responsive">-->
                            <i class="fa fa-{{ $s=='0'?'support':''}}{{$s=='1'?'thumbs-o-up':''}}{{$s=='2'?'camera':''}}{{$s=='3'?'gift':''}}"></i>
                            <p>{{$ser->konten}}</p>
                        </div>
                    </div>
                @endforeach

			</div>
		</div>
	</section>
	<!--end Services-->

	<!-- Packages Section -->
	<section id="packages" class="inverse">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="section-title text-center">
						<h1>Tour & Travel </h1>
					</div>
				</div>
			</div>

			<div class="row">
				@foreach($halaman as $key => $h)
				<div class="col-xs-6 col-sm-6 col-md-3">
					<div class="package-list wow fadeInUp">
						<a href="{{route('page', $h->slug)}}">
							<div class="package-thumb" style="height: 200px;">
								<img src="{{$h->gambar? cloud_image_url($h->gambar, 'res') : url('upload/'.$h->id.'.jpg')}}" alt="{{$h->judul}}" />
								<!-- <div class="duration">
									1 days<br/>1 nights
								</div> -->
							</div>
							<div class="package-info" style="height: 70px;">
								<b>{{$h->judul}}</b>
							</div>
						</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
    <!-- end Packages -->

    <!-- Deals and Discounts -->
	<section id="deals-discounts" >
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="section-title text-center">
						<h1>Special Tour</h1>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<div class="owl-carousel" id="deals-discounts-carousel">

					@foreach($halaman as $h)
						<div class="tour-item">
							<div class="thumb"  style="height: 200px;">
								<img src="{{$h->gambar? cloud_image_url($h->gambar, 'res') : url('upload/'.$h->id.'.jpg')}}" alt="{{$h->judul}}" />
							</div>

							<div class="discount-info" style="height: 100px;">
								<b>{{$h->judul}}</b><br>
								<a href="{{route('page',$h->slug)}}">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
							</div>

						</div>
						@endforeach

					</div><!--end deals-discounts-carousel-->
				</div>
			</div>

		</div>

	</section>
    <!--end deals-discounts-->

    <!-- Gallery Section -->
	<section id="gallery" class="inverse">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="section-title text-center">
						<h1>Gallery</h1>
					</div>
				</div>
			</div>

			<div class="row">
            	<div class="col-xs-12">
                	<ul id="filter-list">
                     	<li class="filter" data-filter="all">ALL</li>
                         @foreach ($tag as $t)
                            <li class="filter" data-filter="{{$t->tag}}">{{$t->tag}}</li>
                         @endforeach
                    </ul><!-- @end #filter-list -->
                </div>
            </div>
		</div>
		<ul class="gallery-item">
            @foreach ($gallery as $img)

                <li class="gallery {{$img->tag}}">
                    <div class="thumb">
                        <img src="{{$img->url}}" alt="" />
                        <div class="gallery-overlay">
                            <div class="gallery-overlay-inner">
                                <h2>{{$img->title}}</h2>
                                <a href="{{$img->url}}" class="fancybox"><i class="fa fa-camera"></i></a>
                            </div>
                        </div>
                    </div><!--end post thumb-->
                </li>

            @endforeach

		</ul>
		<div id="instafeed"></div>

	</section>
    <!-- end gallery-->

    <!-- Testimonials Section -->
	<section id="testimonials">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="section-title text-center">
						<h1>What our clients say?</h1>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
					<div class="owl-carousel" id="testimonial-carousel">
						<div class="testimonial-item text-center">
							<i class="fa fa-quote-left"></i>
							<div class="author-comments">
								<p>Beautiful island that you can enjoy together with friends or family. You can also do diving and snorkelling here because the sea is very clean and you can meet Mantas!.</p>
							</div>
							<div class="designation">
								Kyra Josep
							</div>
						</div>

						<div class="testimonial-item text-center">
							<i class="fa fa-quote-left"></i>
							<div class="author-comments">
								<p>Nusa Penida is stunning! There are so many beautiful things to explore and the people on the island are mostly very kind. I hope it will stay a paradise and I wish that the locals and tourist will clean up a little better in future.</p>
							</div>
							<div class="designation">
								Philip Sony
							</div>
						</div>

						<div class="testimonial-item text-center">
							<i class="fa fa-quote-left"></i>
							<div class="author-comments">
								<p>Amazing experience to visit here, u can feel the vibes around you, a beautiful magnificent view. It's like sit comfortably and see the natural beauty of world.</p>
							</div>
							<div class="designation">
								Singh Modesty
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
	</section>
	<!--end testimonials-->

	<!-- Contact Us Section-->
	<section id="contact-us" class="parallax" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="section-title text-center">
						<h1>Hubungi Kami</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="contact-left">
						<ul>
							<li>
								<div class="icon">
									<i class="fa fa-map-marker"></i>
								</div>
								<div class="contact-info">
                                    @foreach($app as $a)
                                    <p>{{$a->judul=='alamat'?$a->konten:''}}</p>
                                    @endforeach
								</div>
							</li>

							<li>
								<div class="icon">
									<i class="fa fa-phone"></i>
								</div>
								<div class="contact-info">
                                    @foreach($app as $a)
                                    <p><a href="tel:{{$a->judul=='telp'?str_replace(' ', '', $a->konten):''}}">{{$a->judul=='telp'?$a->konten:''}}</a></p>
                                    @endforeach
								</div>
							</li>

							<li>
								<div class="icon">
									<i class="fa fa-envelope"></i>
								</div>
								<div class="contact-info">
                                    @foreach($app as $a)
                                    <p><a href="mailto:{{$a->judul=='email'?$a->konten:''}}">{{$a->judul=='email'?$a->konten:''}}</a></p>
                                    @endforeach
								</div>
							</li>

							<!-- <li>
								<div class="icon">
									<i class="fa fa-clock-o"></i>
								</div>
								<div class="contact-info">
									<p>Monday-Friday: 9am - 5pm <br/> Saturday: 10am - 2pm<br/> Sunday - Closed </p>
								</div>
							</li> -->

						</ul>
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-8">
					<div class="contact-right">
                        <form method="POST" action="{{ route('contact') }}">
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<div class="form-group">
										<input type="text" name="name" class="form-control" placeholder='Name'>
									</div>
								</div>
							</div>
							<div class="form-group">
								<input type="text" name="email" class="form-control" placeholder='Email Address'>
							</div>
							<div class="form-group">
								<textarea class="form-control" name="konten" rows="6" cols="20" placeholder="Write Something"></textarea>
							</div>
							<button type="submit" class="btn btn-primary" name="submit" value="">Submit</button>

                        </form>
					</div>
				</div>

				<div class="clearfix"></div>
				<br>
				<hr>
				<div class="row">
    				<div class="col-xs-12">
    					<div class="">
    						<h5>Liburan di Nusa Penida ~ Travelais Tour dan Travel di Pulau Nusa Penida</h5>
                            <article>
                                <p style="font-size: 10px;">Layanan dari Travelais telah terpercaya memberikan pengalaman terbaik bagi klien-klien kami saat berliburan di Pulau Nusa Penida. Kenyamanan yang kami tawarkan untuk setiap lokasi wisata dengan menyediakan peralatan, transportasi dan akomodasi penginapan yang terbaik.</p>
                            </article>
                            <h5>Holidays in Nusa Penida ~ Travelais Service for Tour and Travel on Nusa Penida Island</h5>
                            <article>
                                <p style="font-size: 10px;">The services of Travelais have been trusted to provide the best experience for our clients while on vacation on Nusa Penida Island. Comfort that we offer for each tourist location by providing the best equipment, transportation and lodging accommodations.</p>
                            </article>
    					</div>
    				</div>
    			</div>
			</div>

		</div>
	</section>
	<!--end contact-us-->

@endsection
