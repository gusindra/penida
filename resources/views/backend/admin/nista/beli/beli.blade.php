@extends('layouts.backend.admin.main')

@section('content')
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> 
                <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-envelope"></i> Orders</a>
            </div>
            <h1>Orders</h1>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box widget-chat">
                        <div class="widget-content nopadding">
                            <div class="chat-users panel-right2">
                                <div class="panel-title">
                                    <h5>Client</h5>
                                </div>
                                <div class="panel-content nopadding">
                                    <ul class="contact-list">
                                        @if(@$order)
                                        <li id="user-Alex" class="online new"><a href="#"><img alt="" src="img/demo/av1.jpg" /> <span style="text-transform: capitalize;">{{$order->name}}</span></a></li>
                                        @endif
                                        @foreach($list as $o=>$book)
                                            <li id="user-Alex" class="online"><a href="{{route('meli.show', $book->id)}}"><img alt="" src="img/demo/av1.jpg" /> <span style="text-transform: capitalize;">{{$book->name}}</span></a></li>
                                        @endforeach
                                        <!-- <li id="user-Linda"><a href=""><img alt="" src="img/demo/av2.jpg" /> <span>Linda</span></a><span class="msg-count badge badge-info">3</span></li>
                                        <li id="user-John" class="online new"><a href=""><img alt="" src="img/demo/av3.jpg" /> <span>John</span></a></li>
                                        <li id="user-Mark" class="online"><a href=""><img alt="" src="img/demo/av4.jpg" /> <span>Mark</span></a></li>
                                        <li id="user-Maxi" class="online"><a href=""><img alt="" src="img/demo/av5.jpg" /> <span>Maxi</span></a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="chat-content panel-left2">
                                <div class="chat-messages" id="chat-messages">
                                @if(@$order)
                                    <div id="chat-messages-inner">
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <table class="">
                                                    <tbody>
                                                        <tr>
                                                            <td><h4>Travelais Nusa Penida</h4></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="span6">
                                                <table class="table table-bordered table-invoice">
                                                    <tbody>
                                                        <tr></tr>
                                                        <tr>
                                                            <td class="width30">Order ID:</td>
                                                            <td class="width70"><strong>{{$order->id}}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Booking Date:</td>
                                                            <td><strong>{{$order->date}}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td> Name:</td>
                                                            <td><strong>{{$order->name}}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td> Email:</td>
                                                            <td><strong>{{$order->email}}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td> Phone:</td>
                                                            <td><strong>{{$order->phone}}</strong></td>
                                                        </tr>
                                                    </tbody>
                                                
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <table class="table table-bordered table-invoice-full">
                                                    <thead>
                                                        <tr>
                                                            <th class="head0">Type</th>
                                                            <th class="head1">Desc</th>
                                                            <th class="head0 right">Qty</th>
                                                            <!-- <th class="head1 right">Price</th>
                                                            <th class="head0 right">Amount</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($order->wna>0)
                                                        <tr>
                                                            <td>WNA</td>
                                                            <td>{{$order->paket->judul}}</td>
                                                            <td class="right">{{$order->wna}}</td>
                                                            <!-- <td class="right">$150</td>
                                                            <td class="right"><strong>$300</strong></td> -->
                                                        </tr>
                                                        @endif
                                                        @if($order->wni>0)
                                                        <tr>
                                                            <td>WNI</td>
                                                            <td>{{$order->paket->judul}}</td>
                                                            <td class="right">{{$order->wni}}</td>
                                                            <!-- <td class="right">$1,200</td>
                                                            <td class="right"><strong>$1,2000</strong></td> -->
                                                        </tr>
                                                        @endif
                                                        
                                                    </tbody>
                                                </table>
                                                <hr>
                                                <!-- <table class="table table-bordered table-invoice-full">
                                                    <tbody>
                                                        <tr>
                                                        <td class="msg-invoice" width="85%"><h4>Payment method: </h4>
                                                            <a href="#" class="tip-bottom" data-original-title="Wire Transfer">Wire transfer</a> |  <a href="#" class="tip-bottom" data-original-title="Bank account">Bank account #</a> |  <a href="#" class="tip-bottom" data-original-title="SWIFT code">SWIFT code </a>|  <a href="#" class="tip-bottom" data-original-title="IBAN Billing address">IBAN Billing address </a></td>
                                                        <td class="right"><strong>Subtotal</strong> <br>
                                                            <strong>Tax (5%)</strong> <br>
                                                            <strong>Discount</strong></td>
                                                        <td class="right"><strong>$7,000 <br>
                                                            $600 <br>
                                                            $50</strong></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="pull-right">
                                                    <h4><span>Amount Due:</span> $7,650.00</h4>
                                                    <br>
                                                    <a class="btn btn-primary btn-large pull-right" href="">Pay Invoice</a> 
                                                </div> -->
                                            </div>
                                        </div>
                                        {{ Form::open(array('url' => route('meli.buung', $order->id), 'method' => 'DELETE', 'class' => 'delete')) }}
                                            <button class=" btn btn-danger" type="submit"><i class="icon-trash"></i> Hapus order</button>
                                        {{ Form::close() }}
                                    </div>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end-main-container-part-->
@endsection