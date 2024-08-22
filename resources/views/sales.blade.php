@extends('template.template')
@section('title', 'My Sales - Enthusiart')
@section('content')
<section class="container py-5" style="margin-top: 80px;">
    <h1 class="text-center">My Sales</h1>
    <div class="table-responsive">
        <table class="table table-borderless mt-5">
            <thead class="table-secondary">
                <tr class="table-header">
                    <th>Artwork</th>
                    <th>Total Order</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                <tr>
                    <td colspan="4">
                        <div class="card mt-3">
                            <div class="card-header d-flex justify-content-between mt-2">
                                <div class="d-flex card-head">
                                    @if ($sale->user && $sale->user->image)
                                        <img src="{{ asset('storage/uploads/avatar/' . $sale->user->image) }}" class="rounded-avatar me-2">
                                    @else
                                        <i class="fa-solid fa-circle-user fa-xl mt-2 me-2" style="color: #364A99;"></i>
                                    @endif
                                    <p class="fw-medium text-start">{{ $sale->user->fullname }}</p>
                                </div>
                                <div class="d-flex card-head">
                                    <p class="fw-medium text-end">Invoice No:</p>
                                    <p class="ms-2">{{ $sale->invoice_number }}</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="sales-wrapper">
                                    <img src="{{ asset('storage') }}/uploads/arts/{{ $sale->artwork->image }}" class="img-artwork" alt="Artwork">
                                    <div class="detail-sales">
                                        <p style="font-weight: 600;">{{ $sale->artwork->artwork_name }}</p>
                                        <p class="mt-2">{{ $sale->artwork->materials }}</p>
                                        <p class="mt-2">{{ $sale->artwork->dimension }}</p>
                                        <p class="mt-4" style="font-size: 16px; font-weight: 500;">
                                            Rp{{ number_format($sale->artwork->price, 0, ',', '.') }}
                                            <span class="ms-2">×{{ $sale->quantity }}</span>
                                        </p>
                                    </div>
                                    <div class="sales-total">
                                        <p class="">Rp{{ number_format($sale->artwork->price, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="sales-status">
                                        <p class="">{{ $sale->status }}</p>
                                    </div>
                                    <div class="btn-container">
                                        <a href="/sale/order/{{ $sale->id }}" class="btn btn-detail">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if($sales->count() > 0)
    <div class="d-flex justify-content-center mt-5">
        <ul class="pagination">
            <!-- Previous Page Link -->
            <li class="page-item {{ $sales->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $sales->previousPageUrl() }}" tabindex="-1">Previous</a>
            </li>
    
            <!-- Page Number Links -->
            @foreach ($sales->getUrlRange(1, $sales->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $sales->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach
    
            <!-- Next Page Link -->
            <li class="page-item {{ $sales->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $sales->nextPageUrl() }}">Next</a>
            </li>
        </ul>
    </div>
    @else
        <p class="text-center py-5">You have no sales history.</p>
    @endif      
</section>
@endsection