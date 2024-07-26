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
                            <p class="mt-4" style="font-size: 16px; font-weight: 600;">Rp{{ number_format($art->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-wrapper">
                        <p>Fullname: {{ $user->fullname }}</p>
                        <p>Email: {{ $user->email }}</p>
                        <p>Phone: {{ $user->phone }}</p>
                        <p>Address: {{ $user->address }}</p>
                        <button type="submit" class="btn btn-save mt-4" id="pay-button">Pay Now</button>
                    </div>
                </div>
            </div>
        </div>
        {{--  <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
        <div id="snap-container"></div>  --}}
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
          window.location.replace('/order/history');
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
