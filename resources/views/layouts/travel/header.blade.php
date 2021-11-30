<!-- Navigation -->

<nav class="navbar navbar-default navbar-fixed-top">

    <div class="container">

        <div class="row">

            <div class="col-xs-12">

                <div class="navbar-header page-scroll">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">

                        <span class="sr-only">Toggle navigation</span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                    </button>

                    <a class="navbar-brand page-scroll" href="{{route('home')}}"><img src="{{url($logo->konten)}}" alt="Logo" /></a>

                </div>



                <!-- Collect the nav links, forms, and other content for toggling -->

                <div class="collapse navbar-collapse" id="navbar">

                    <ul class="nav navbar-nav navbar-right" style="margin-top: 30px;">

                        <li class="{{ str_replace(url('/'), '', url()->current())==''?'active':'' }}">

                            <a class="page-scroll" href="{{route('home')}}#page-top">Home</a>

                        </li>

                        <li class="{{ str_replace(url('/'), '', url()->current())=='/#packages'?'active':'' }}">

                            <a class="page-scroll" href="{{route('home')}}#packages">PAKAGE TOUR & TRAVEL</a>

                        </li>

                        <li class="{{ str_replace(url('/'), '', url()->current())=='/destinasi'?'active':'' }}">

                            <a class="page-scroll" href="{{route('page', 'destinasi')}}">Destinasi</a>

                        </li>

                        <!--<li class="{{ str_replace(url('/'), '', url()->current())=='/jadwal-keberangkatan'?'active':'' }}">

                            <a class="page-scroll" href="{{route('page', 'jadwal-keberangkatan')}}">Jadwal Keberangkatan</a>

                        </li>-->

                        <li class="{{ str_replace(url('/'), '', url()->current())=='/hotel'?'active':'' }}">

                            <a class="page-scroll" href="{{route('page', 'hotel')}}">Hotel</a>

                        </li>

                        <!--<li class="{{ str_replace(url('/'), '', url()->current())=='/tirtayatra'?'active':'' }} ">

                            <a class="page-scroll" href="{{route('page', 'tirtayatra')}}">Tirtayatra</a>

                        </li>-->

                        <li class="{{ str_replace(url('/'), '', url()->current())=='/#contact-us'?'active':'' }}">

                            <a class="page-scroll" href="{{route('home')}}#contact-us">Kontak</a>

                        </li>

                    </ul>

                </div>

                <!-- /.navbar-collapse -->

            </div>

        </div>



    </div>

    <!-- /.container -->

</nav>
