@extends('template.template')
@section('title', 'My Purchase - Enthusiart')
@section('content')
<section class="purchase-section py-5 mb-5">
    <div class="container">
        <h1 class="page-title text-center">My Purchase</h1>
        @foreach ($orders as $order)
        <div class="order-card">
            <div class="row align-items-center mb-4">
                <div class="col-md-2">
                    <div class="img-order">
                        <img src="{{ asset('storage') }}/uploads/arts/{{ $art->image }}" alt="Art Image" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="fw-semibold">$art->artist_name</p>
                    <p class="mb-1">$art->artwork_name</p>
                    <p class="mb-1">{{ $art->materials }}, {{ $art->dimension }}</p>
                </div>
                <div class="d-flex justify-content-end">
                    <p>Rp{{ number_format($order->price, 0, ',', '.') }}</p>
                </div>
            </div>
            <hr>
            <div class="row mt-4">
                <div class="d-flex justify-content-end fw-semibold">
                    <p class="me-2">Total:</p>
                    <p>Rp{{ number_format($order->price, 0, ',', '.') }}</p>
                </div>
                <div class="text-end mt-4">
                    <a href="#" class="btn btn-save">Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection