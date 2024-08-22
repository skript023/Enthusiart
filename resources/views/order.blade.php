@extends('template.template')
@section('title', 'Order Detail - Enthusiart')
@section('content')
<section class="py-5 invoice-section mb-5" style="margin-top: 80px;">
    <div class="container">
        <h1 class="page-title text-center">Order Detail</h1>
        <div class="content-wrapper" style="padding: 60px 70px; background-color: #F0F3FF;">
            <div class="row">
                <div class="order-head d-flex justify-content-between align-items-center">
                    <div class="order-field d-flex align-items-start flex-row">
                        <p>Invoice No.</p>
                        <p class="fill-order ms-2">{{ $invoice_number }}</p>
                    </div>
                    <div class="order-field d-flex align-items-center flex-row">
                        <p class="fill-order fw-medium">{{ $order->status }}</p>
                    </div>
                </div>
                <div class="order-cust mt-5">
                    <div class="order-field">
                        <div class="d-flex">
                            <p class="me-2">Customer Name:</p>
                            <p class="fill-order">{{$order->user->fullname}}</p>
                        </div>
                        <div class="d-flex">
                            <p class="me-2">Address:</p>
                            <p class="fill-order">{{$order->user->address}}</p>
                        </div>
                        <div class="d-flex">
                            <p class="me-2">Phone:</p>
                            <p class="fill-order">{{$order->user->phone}}</p>
                        </div>
                    </div>
                </div>
                <hr class="mt-5">
                <div class="order-sum mt-5">
                    <div class="order-field">
                        <h5 class="mb-5">Order Summary</h5>
                        <div class="d-flex">
                            <p class="me-2">Artwork Name:</p>
                            <p class="fill-order">{{$order->artwork->artwork_name}}</p>
                        </div>
                        {{--  <div class="d-flex">
                            <p class="me-2">Artist Name:</p>
                            <p class="fill-order">{{$order->artwork->artist_name}}</p>
                        </div>  --}}
                        <div class="d-flex">
                            <p class="me-2">Price:</p>
                            <p class="fill-order">Rp{{ number_format($order->artwork->price, 0, ',', '.') }}</p>
                        </div>
                        <div class="d-flex mb-5">
                            <p class="me-2">Qty:</p>
                            <p class="fill-order">{{ $order->quantity }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-start flex-column">
                                <p class="mb-2">Total Payment</p>
                                <p class="fill-order">Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                            </div>
                            @if($order->payment && $order->payment->payment_type)
                            <div class="d-flex align-items-start flex-column">
                                <p class="mb-2">Payment Method</p>
                                <p class="fill-order">{{$order->payment->payment_type}}</p>
                            </div>
                            @endif
                            @if($order->payment && $order->payment->transaction_time)
                                <div class="d-flex align-items-start flex-column">
                                    <p class="mb-2">Payment Time</p>
                                    <p class="fill-order">{{$order->payment->transaction_time}}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection