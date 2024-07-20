@extends('template.template')
@section('title', 'Invoice - Enthusiart')
@section('content')
<section class="py-5 invoice-section mb-5" style="margin-top: 80px;">
    <div class="container">
        <h1 class="page-title text-center">Invoice</h1>
        <div class="content-wrapper" style="padding: 60px 70px; background-color: #F0F3FF;">
            <div class="row">
                <div class="order-head d-flex justify-content-between align-items-center">
                    <img src="{{ asset('storage') }}/uploads/arts/{{ $order->image }}" alt="Enthusiart">
                    <div class="order-field d-flex align-items-end flex-column">
                        <p>Invoice Number</p>
                        <p class="fill-order">$order->invoice_number</p>
                    </div>
                </div>
                <div class="order-cust mt-5">
                    <div class="order-field">
                        <div class="d-flex">
                            <p class="me-2">Full Name:</p>
                            <p class="fill-order">$order->fullname</p>
                        </div>
                        <div class="d-flex">
                            <p class="me-2">Address:</p>
                            <p class="fill-order">$order->address</p>
                        </div>
                        <div class="d-flex">
                            <p class="me-2">Phone:</p>
                            <p class="fill-order">$order->phone</p>
                        </div>
                    </div>
                </div>
                <hr class="mt-5">
                <div class="order-sum mt-5">
                    <div class="order-field">
                        <h5 class="mb-5">Order Summary</h5>
                        <div class="d-flex">
                            <p class="me-2">Artwork Name:</p>
                            <p class="fill-order">$order->artwork_name</p>
                        </div>
                        <div class="d-flex">
                            <p class="me-2">Artist Name:</p>
                            <p class="fill-order">$order->artist_name</p>
                        </div>
                        <div class="d-flex mb-5">
                            <p class="me-2">Price:</p>
                            <p class="fill-order">Rp{{ number_format($order->price, 0, ',', '.') }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-start flex-column">
                                <p class="mb-2">Total Payment</p>
                                <p class="fill-order">Rp{{ number_format($order->price, 0, ',', '.') }}</p>
                            </div>
                            <div class="d-flex align-items-start flex-column">
                                <p class="mb-2">Payment Method</p>
                                <p class="fill-order">$order->payment_type</p>
                            </div>
                            <div class="d-flex align-items-start flex-column">
                                <p class="mb-2">Payment Time</p>
                                <p class="fill-order">$order->payment_time</p>
                            </div>
                        </div>
                        <hr class="mt-5">
                        <div class="d-flex justify-content-center mt-5">
                            <a href="#" class="btn btn-save">Download Invoice</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection