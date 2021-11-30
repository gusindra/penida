@extends('layouts.backend.admin.main')
@section('content')
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-cog"></i> Pengaturan</a>
            </div>
            <h1>Pengaturan</h1>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid"><hr>
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @include('partials.messages')
            <div class="row-fluid">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Aplication</h5>
                        </div>
                        <div class="widget-content nopadding">
                            {{ Form::open(array('url' => route('update.app', 'app'), 'method' => 'PUT', 'name'=>'basic_validate', 'class'=>'form-horizontal basic_validate','novalidate'=>'novalidate')) }}
                                @foreach($peng as $p)
                                    @if($p->key=='app')
                                    <div class="control-group">
                                        <label class="control-label">{{$p->judul}}</label>
                                        <div class="controls">
                                            <input value="{{$p->konten}}" type="{{$p->judul!=='email'?'text':'email'}}" name="{{$p->id}}" class="{{$p->judul}}">
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                <div class="form-actions right right">
                                    <input type="submit" value="simpan" class="btn btn-success">
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Sosial Media</h5>
                        </div>
                        <div class="widget-content nopadding">
                            {{ Form::open(array('url' => route('update.app', 'sosial'), 'method' => 'PUT', 'name'=>'basic_validate', 'class'=>'form-horizontal basic_validate','novalidate'=>'novalidate')) }}
                                @foreach($peng as $p)
                                    @if($p->key=='sosmed')
                                    <div class="control-group">
                                        <label class="control-label">{{$p->judul}}</label>
                                        <div class="controls">
                                            <input value="{{$p->konten}}" type="text" name="{{$p->id}}" class="{{$p->judul}} url">
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                <div class="form-actions right right">
                                    <input type="submit" value="simpan" class="btn btn-success">
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Term & Aggrement</h5>
                        </div>
                        <div class="widget-content nopadding">
                            {{ Form::open(array('url' => route('update.app', 'app'), 'method' => 'PUT', 'name'=>'basic_validate', 'class'=>'form-horizontal basic_validate','novalidate'=>'novalidate')) }}
                                @foreach($peng as $p)
                                    @if($p->key=='legal')
                                    <div class="control-group">
                                        <label class="control-label">{{$p->judul}}</label>
                                        <div class="controls">
                                            <textarea class="span10 {{$p->judul}}" name="{{$p->id}}" >{{$p->konten}}</textarea>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                <div class="form-actions right right">
                                    <input type="submit" value="simpan" class="btn btn-success">
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Security validation</h5>
                        </div>
                        <div class="widget-content nopadding">
                            {{ Form::open(array('url' => route('update.profile', Auth::user()->id), 'method' => 'PUT', 'name'=>'password_validate', 'class'=>'form-horizontal password_validate','novalidate'=>'novalidate')) }}

                                <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input value="{{Auth::user()->email}}" type="email" name="email" required />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Username</label>
                                    <div class="controls">
                                        <input value="{{Auth::user()->username}}" type="text" name="username" required />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Password</label>
                                    <div class="controls">
                                        <input type="password" name="password" id="pwd" required />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Confirm password</label>
                                    <div class="controls">
                                        <input type="password" name="password_confirmation" id="pwd2" required />
                                    </div>
                                </div>
                                <div class="form-actions right">
                                    <input type="submit" value="simpan" class="btn btn-success">
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span4">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Caption Halaman Utama</h5>
                        </div>
                        <div class="widget-content">
                             {{ Form::open(array('url' => route('update.caption', Auth::user()->id), 'method' => 'PUT', 'name'=>'basic_validate', 'class'=>'form-horizontal basic_validate','novalidate'=>'novalidate')) }}
                                @foreach($peng as $p)
                                    @if($p->key=='frontend')
                                        @if($p->judul=='caption')
                                            <div class="control-group">
                                                <label class="span12" style="text-transform: capitalize;">{{$p->judul}}</label>

                                                <input value="{{$p->konten}}" class="span12 {{$p->judul}}" type="text" name="judul[{{$p->id}}]"><br><br>
                                                <textarea class="span12" name="deskripsi[{{$p->id}}]" class="{{$p->judul}}">{{$p->deskripsi}}</textarea>
                                            </div><hr>
                                        @endif
                                    @endif
                                @endforeach
                                <div class="form-actions right right">
                                    <input type="submit" value="simpan" class="btn btn-success">
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Service Halaman Utama</h5>
                        </div>
                        <div class="widget-content">
                            {{ Form::open(array('url' => route('update.app', 'app'), 'method' => 'PUT', 'name'=>'basic_validate', 'class'=>'form-horizontal basic_validate','novalidate'=>'novalidate')) }}
                                @foreach($peng as $p)
                                    @if($p->key=='frontend')
                                        @if($p->judul=='services')
                                            <div class="control-group">
                                                <label class="span12" style="text-transform: capitalize;">{{$p->judul}}</label>
                                                <input value="{{$p->konten}}" class="span12 {{$p->judul}}" type="text" name="{{$p->id}}" {{$p->judul}}>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                                <div class="form-actions right right">
                                    <input type="submit" value="simpan" class="btn btn-success">
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Other Halaman Utama</h5>
                        </div>
                        <div class="widget-content">
                            {{ Form::open(array('url' => route('update.app', 'app'), 'method' => 'PUT', 'name'=>'basic_validate', 'class'=>'form-horizontal basic_validate','novalidate'=>'novalidate')) }}
                                @foreach($peng as $p)
                                    @if($p->key=='frontend')
                                        @if($p->judul!='caption' && $p->judul!='services')
                                            <div class="control-group">
                                                <label class="span12" style="text-transform: capitalize;">{{$p->judul}}</label>
                                                <input value="{{$p->konten}}" class="span12 {{$p->judul}}" type="text" name="{{$p->id}}" {{$p->judul}}>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                                <div class="form-actions right right">
                                    <input type="submit" value="simpan" class="btn btn-success">
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!--end-main-container-part-->
@endsection

@section('js')
<script>
    $(".email").rules("add", {
        required:true,
        email:true
    });
     $(".url").rules("add", {
        url:true
    });
</script>
@endsection
