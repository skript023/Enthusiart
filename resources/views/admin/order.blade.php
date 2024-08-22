@extends('admin.layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Order List</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Order</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Invoice No.</th>
                            <th>Customer</th>
                            <th>Address</th>
                            <th>Artist</th>
                            <th>Artwork</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Payment Time</th>
                            {{--  <th>Action</th>  --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->invoice_number }}</td>
                            <td>{{ $order->user->fullname}}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->artwork->artist_name }}</td>
                            <td>{{ $order->artwork->artwork_name }}</td>
                            <td>Rp{{ number_format($order->artwork->price, 0, ',', '.') }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td>
                                @if($order->payment && $order->payment->payment_type)
                                    {{ $order->payment->payment_type }}
                                @endif
                            </td>
                            <td>{{ $order->status }}</td>
                            <td>
                                @if($order->payment && $order->payment->transaction_time)
                                    {{ $order->payment->transaction_time }}
                                @endif
                            </td>
                            {{--  <td>
                                <div class="btn-edit">
                                    <i class="fas fw fa-pen-to-square mr-3" style="color: #1cc88a">
                                        <a href="/dashboard/order/edit/{{ $order->id }}"></a>
                                    </i>
                                    <i class="fas fw fa-trash" style="color: #E61010">
                                        <a href="/dashboard/order/delete/{{ $order->id }}"></a>
                                    </i>
                                </div>
                            </td>  --}}
                        </tr>
                        @endforeach
                    </tbody>
                    {{--  <tfoot>
                        <tr>
                            <th>Customer</th>
                            <th>Address</th>
                            <th>Artist</th>
                            <th>Artwork</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Payment</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                        </tr>
                    </tfoot>  --}}
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection