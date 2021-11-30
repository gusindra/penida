@extends('layouts.backend.admin.main')

@section('content')
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route('mandala') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Beranda</a></div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">
            <br>
            <div class="widget-box widget-plain">
                
                <div class="center">
                    <ul class="stat-boxes2">
                        <li>
                            @php 
                            if(@$week['5']['visitors']!=0){
                                ($per = @$week['6']['visitors']-@$week['5']['visitors'])/@$week['5']['visitors']*100;
                            }else{ 
                                $per=0;
                            } 
                            @endphp
                            <div class="left peity_bar_{{$per>0?'good':'bad'}}"><span><span style="display: none;">
                                @foreach($week as $k => $w)
                                    {{$w['visitors']}},
                                @endforeach
                            </span>
                            <canvas width="50" height="24"></canvas>
                            </span> {{$per}}%</div>
                            <div class="right"> <strong>
                                @php $total=0 @endphp
                                @foreach($week as $k => $w)
                                    @php $total=$total+$w['visitors'] @endphp
                                @endforeach
                                {{$total}}
                                </strong> Jumlah pengunjung </div>
                        </li>
                        <li>
                            @php 
                            if(@$week['5']['pageViews']!=0){($per = @$week['6']['pageViews']-@$week['5']['pageViews'])/@$week['5']['pageViews']*100;}
                            else{$per=0;} @endphp
                            <div class="left peity_line_{{$per>0?'good':'bad'}}"><span><span style="display: none;">
                                @foreach($week as $k => $w)
                                    {{$w['pageViews']}},
                                @endforeach
                            </span>
                            <canvas width="50" height="24"></canvas>
                            </span> {{$per}}%</div>
                            <div class="right"> <strong>
                            @php $total=0 @endphp
                                @foreach($week as $k => $w)
                                    @php $total=$total+$w['pageViews'] @endphp
                                @endforeach
                                {{$total}}</strong> Jumlah halaman yg dilihat </div>
                        </li>
                        
                        <li>
                            @php if($order[6]!=0) $per = (@$order[7]-@$order[6])/@$order[6]*100 @endphp
                            <div class="left peity_bar_bad"><span><span style="display: none;">{{@$order[1],@$order[2],@$order[3],@$order[4],@$order[5],@$order[6],@$order[7]}}</span>
                            <canvas width="50" height="24"></canvas>
                            </span>{{$per}}%</div>
                            <div class="right"> <strong>{{$order['all']}}</strong> Jumlah Orders</div>
                        </li>
                    </ul>
                </div>
            </div>

            <!--Chart-box-->    
            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                        <h5>Site Analytics</h5>
                    </div>
                    <div class="widget-content" >
                        <div class="row-fluid">
                            <div class="span10 offset1">
                                <div class="chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End-Chart-box--> 

            <hr/>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
                            <h5>Latest Posts</h5>
                        </div>
                        <div class="widget-content nopadding collapse in" id="collapseG2">
                            <ul class="recent-posts">
                                @foreach($hal as $h=>$halaman)
                                <li>
                                    <div class="user-thumb"> <img width="40" height="40" alt="tile" src="{{url('upload/'.$halaman->id.'.jpg')}}"> </div>
                                    <div class="article-post"> <span class="user-info"> Tipe: {{$halaman->tipe}} | Created: {{$halaman->created_at->format('d M Y')}} | Updated: {{$halaman->updated_at->format('d M Y')}} </span>
                                    <p><a href="#">{{$halaman->judul}}</a> </p>
                                    </div>
                                </li>
                                @endforeach
                                <li>
                                    <a href="{{ route('karang') }}" class="btn btn-warning btn-mini">View All</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end-main-container-part-->
@endsection

@section('js')
    <script src="{{ url('assets/js/backend/jquery.flot.min.js') }}"></script> 
    <script src="{{ url('assets/js/backend/jquery.flot.categories.js') }}"></script> 
    <script src="{{ url('assets/js/backend/jquery.flot.resize.min.js') }}"></script> 
    <script src="{{ url('assets/js/backend/matrix.dashboard.js') }}"></script> 
    <script>
        // === Prepare the chart data ===/
        var sin = [], cos = [], xlabel = [];

        // for (var i = 1; i < 30; i += 1) {
        //     sin.push([i, Math.sin(i)]);
        //     cos.push([i, Math.cos(i)]);
        // }

        @foreach($month as $m => $bulan)
            sin.push(["{{$bulan['date']->format('d M')}}", {{$bulan['visitors']}}]);
            cos.push(["{{$bulan['date']->format('d M')}}", {{$bulan['pageViews']}}]);
            xlabel.push([{{$m}}, "{{$bulan['date']->format('d M Y')}}"]);
        @endforeach
        // === Make chart === //
        var plot = $.plot($(".chart"),
            [{ data: sin, label: "Jumlah pengunjung", color: "#ee7951" }, { data: cos, label: "Jumlah kunjungan",color: "#4fb9f0" } ], {
                series: {
                    lines: { show: true },
                    points: { show: true }
                },
                grid: { hoverable: true, clickable: true },
                yaxis: { min: 0 },
                xaxis: {
                    mode: "categories",
                    ticks: xlabel
                }
            });
        
        // === Point hover in chart === //
        var previousPoint = null;
        $(".chart").bind("plothover", function (event, pos, item) {
            
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
                    
                    $('#tooltip').fadeOut(200,function(){
                        $(this).remove();
                    });
                    var x = item.datapoint[0],
                        y = item.datapoint[1];
                        
                    maruti.flot_tooltip(item.pageX, item.pageY,item.series.label +  " : " + y);
                }
                
            } else {
                $('#tooltip').fadeOut(200,function(){
                        $(this).remove();
                    });
                previousPoint = null;           
            }   
        });	
    </script>
@endsection