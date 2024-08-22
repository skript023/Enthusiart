@extends('template.template')
@section('title', 'Invoice - Enthusiart')
@section('content')
<section class="py-5 invoice-section mb-5" style="margin-top: 80px;">
    <div class="container">
        <h1 class="page-title text-center">Invoice</h1>
        <div class="content-wrapper" style="padding: 60px 70px; background-color: #F0F3FF;">
            <div class="row">
                <div class="order-head d-flex justify-content-between align-items-center">
                    <img src="{{ asset('assets') }}/img/logo-72.png" alt="Enthusiart">
                    <div class="order-field d-flex align-items-end flex-column">
                        <p>Invoice Number</p>
                        <p class="fill-order">{{ $invoice_number }}</p>
                    </div>
                </div>
                <div class="order-cust mt-5">
                    <div class="order-field">
                        <div class="d-flex">
                            <p class="me-2">Full Name:</p>
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
                        <table class="table mb-5">
                            <thead class="table-secondary">
                                <tr>
                                    <td scope="col" class="col-table">Artwork Name</td>
                                    <td scope="col" class="col-table">Artist Name</td>
                                    <td scope="col" class="col-table">Qty</td>
                                    <td scope="col" class="col-table">Price</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">{{ $order->artwork->artwork_name }}</td>
                                    <td>{{ $order->artwork->artist_name }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>Rp{{ number_format($order->artwork->price, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            {{--  <tfoot class="table-secondary">
                                <td colspan="3">Subtotal</td>
                                <td>Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                            </tfoot>  --}}
                        </table>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-start flex-column">
                                <p class="mb-2">Total Payment</p>
                                <p class="fill-order">Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                            </div>
                            <div class="d-flex align-items-start flex-column">
                                <p class="mb-2">Payment Method</p>
                                <p class="fill-order">{{$order->payment->payment_type}}</p>
                            </div>
                            <div class="d-flex align-items-start flex-column">
                                <p class="mb-2">Transaction Status</p>
                                <p class="fill-order">{{$order->status}}</p>
                            </div>
                            <div class="d-flex align-items-start flex-column">
                                <p class="mb-2">Payment Time</p>
                                <p class="fill-order">{{$order->payment->transaction_time}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection