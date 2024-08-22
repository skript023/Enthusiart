@extends('template.template')
@section('title', 'Order Details - Enthusiart')
@section('content')
<section class="py-5 transaction-section" style="margin-top: 80px;">
    <div class="container">
        <h1 class="page-title text-center">Your Order</h1>
        <div class="content-wrapper" style="padding: 30px 30px; background-color: #F0F3FF;">
            <div class="row">
                <div class="col-lg-6">
                    <div class="order-wrapper">
                        <img src="{{ asset('storage') }}/uploads/arts/{{ $art->image }}" class="img-art" alt="Artwork">
                        <div class="detail-order">
                            <p style="font-weight: 600;">{{ $art->artwork_name}}</p>
                            <p class="mt-2">{{ $art->artist_name }}, {{ $art->year }}</p>
                            <p class="mt-2">{{ $art->materials }}</p>
                            <p class="mt-2">{{ $art->dimension }}</p>
                            <p class="mt-4" style="font-size: 16px; font-weight: 500;">
                              Rp{{ number_format($art->price, 0, ',', '.') }}
                              <span class="ms-2">×{{ $quantity }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="price-container mt-4">
                      <div class="price-wrapper">
                          <p class="total-price">Total Payment</p>
                      </div>
                      <div class="price-wrapper">
                          <p class="total-price">Rp{{ number_format($total_price, 0, ',', '.') }}</p>
                      </div>
                    </div>
                </div>
                <div class="col-lg-6">
                  <div class="info-wrapper">
                    <div class="info-detail mb-4">
                        <h5 class="mb-2">Fullname: </h5>
                        <p>{{ $user->fullname }}</p>
                    </div>
                    <div class="info-detail mb-4">
                        <h5 class="mb-2">Email: </h5>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="info-detail mb-4">
                        <h5 class="mb-2">Phone: </h5>
                        <p>{{ $user->phone }}</p>
                    </div>
                    <div class="info-detail mb-5">
                        <h5 class="mb-2">Address: </h5>
                        <p>{{ $user->address }}</p>
                    </div>
                    <button type="submit" class="btn btn-save" id="pay-button">Pay Now</button>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{$snapToken}}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          alert("payment success!"); console.log(result);
          window.location.replace('/payment/success/{{ $order->id }}');
        },
        onPending: function(result){
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      })
    });
  </script>
@endpush
@endsection
