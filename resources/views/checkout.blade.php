@extends('template.template')
@section('title', 'Checkout - Enthusiart')
@section('content')
<section class="py-5 checkout-section" style="margin-top: 80px;">
    <div class="container">
        <h1 class="page-title text-center">Checkout</h1>
        <div class="content-wrapper" style="padding: 30px 30px; background-color: #F0F3FF;">
            <div class="row">
                <div class="col-lg-6">
                    <div class="order-wrapper">
                        <img src="{{ asset('storage') }}/uploads/arts/{{ image }}" class="img-art" alt="Artwork">
                        <div class="detail-order">
                            <p style="font-weight: 600;">{{ artist_name}}</p>
                            <p class="mt-1">{{ artwork_name }}</p>
                            <p class="mt-1">{{ materials }}</p>
                            <p class="mt-1">{{ dimension }}</p>
                            <p class="mt-4" style="font-size: 16px; font-weight: 500;">{{ price }}</p>
                        </div>
                    </div>
                    {{--  <div class="price-container mt-4">
                        <div class="price-wrapper">
                            <p>Price</p>
                            <p class="total-price">Total</p>
                        </div>
                        <div class="price-wrapper">
                            <p>{{ $art->price }}</p>
                            <p class="total-price">{{ $art->total_price }}</p>
                        </div>
                    </div>  --}}
                    <hr>
                    <div class="form-group">
                        <label for="note" class="form-label">Note</label>
                        <textarea class="form-control" name="note" id="note"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-wrapper">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Full Name -->
                            <div class="form-forup mb-3">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input value="{{ auth()->user()->fullname }}" type="text" class="form-control" name="fullname" id="fullname" placeholder="" required>
                            </div>
                            <!-- Email -->
                            <div class="form-forup mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input value="{{ auth()->user()->email }}" type="text" class="form-control" name="email" id="email" placeholder="" required>
                            </div>
                            <!-- Phone Number -->
                            <div class="form-group mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input value="{{ auth()->user()->phone }}" type="text" class="form-control" name="phone" id="phone" placeholder="+62xxxxxxxxxxx" required>
                            </div>
                            <!-- Address -->
                            <div class="form-group mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" name="address" id="address" placeholder="" required>{{ auth()->user()->address }}</textarea>
                            </div>
                        </form>
                        <button type="submit" class="btn btn-save mt-4">Make a Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection