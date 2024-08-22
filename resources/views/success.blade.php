@extends('template.template')
@section('title', 'Transaction Success - Enthusiart')
@section('content')
<section class="py-5 success-section mb-5" style="margin-top: 80px;">
    <div class="success-container">
        <div class="success-icon text-center">
            <i class="fas fa-check-circle"></i>
        </div>
        <h2 class="success-message text-center mb-4">Payment Success!</h2>
        <p class="success-details text-center">
            Thank you for purchasing.<br>
            Your order will be shipped to your address.
        </p>
        <a href="/order/history" class="btn btn-save mt-5">See Purchase History</a>
    </div>
</section>
@endsection