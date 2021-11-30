<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-5">
                <div class="text-left">
                    <ul>
                        @foreach($sosmed as $s)
                            <li><a href="{{$s->konten}}"><i class="fa fa-{{$s->judul}}" aria-haspopup="true"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-7">
                <div class="text-right">
                    <p>&copy; Copyright {{date('Y')}}. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bact to top Section-->
<div class="back-top">
    <a href="#"><i class="fa fa-angle-up"></i></a>
</div>