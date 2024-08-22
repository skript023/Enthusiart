@extends('template.template')
@section('title', 'My Purchase - Enthusiart')
@section('content')
<section class="purchase-section py-5 mb-5" style="margin-top: 80px;">
    <div class="container">
        <h1 class="page-title text-center">My Purchase</h1>
        @foreach ($orders as $order)
        <div class="order-card mb-4">
        {{--  <div class="order-card mb-4" onclick="location.href='/order/invoice/{{ $order->id }}'" role="button">  --}}
            <div class="invoice-header d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <p>Invoice No: {{ $order->invoice_number }}</p>
                </div>
                <div class="d-flex align-items-center">
                    <p>{{ $order->status }}</p>
                </div>
            </div>
            <hr class="mt-1 mb-4">
            <div class="row align-items-center mb-4">
                <div class="col-md-2">
                    <div class="img-order">
                        <img src="{{ asset('storage') }}/uploads/arts/{{ $order->artwork->image }}" alt="Art Image" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6">
                <p class="fw-semibold">{{ $order->artwork->artist_name }}</p>
                    <p class="mb-1">{{ $order->artwork->artwork_name }}, {{ $order->artwork->year }}</p>
                    <p class="mb-1">{{ $order->artwork->materials }}</p>
                    <p class="mb-1">{{ $order->artwork->dimension }}</p>
                </div>
                <div class="d-flex justify-content-end">
                    <p>Rp{{ number_format($order->artwork->price, 0, ',', '.') }}</p>
                    <span class="ms-2">×{{ $order->quantity }}</span>
                </div>
            </div>
            <hr>
            <div class="row mt-4">
                <div class="d-flex justify-content-end fw-semibold">
                    <p class="me-2">Total:</p>
                    <p>Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                </div>
                <div class="text-end mt-4">
                    @if ($order->status == 'Waiting for Payment')
                        <a href="/order/{{ $order->id }}/payment" class="btn btn-outline-primary">Continue Payment</a>
                    @elseif ($order->status == 'Success')
                        <a href="/order/invoice/{{ $order->id }}" class="btn btn-save ms-2">Invoice</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        
        @if($orders->count() > 0)
        <div class="d-flex justify-content-center mt-5">
            <ul class="pagination">
                <!-- Previous Page Link -->
                <li class="page-item {{ $orders->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $orders->previousPageUrl() }}" tabindex="-1">Previous</a>
                </li>
        
                <!-- Page Number Links -->
                @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $orders->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
        
                <!-- Next Page Link -->
                <li class="page-item {{ $orders->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $orders->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </div>
        @else
            <p class="text-center py-5">You have no purchase history.</p>
        @endif        
    </div>
</section>
@endsection