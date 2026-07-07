@extends('layouts.admin')
@section('content')
    
    <div class="container-fluid px-4">
        <div class="my-5">
            <h3 class="my-4 d-inline">Order Details</h3>
            <a href="{{ route('backend.orders') }}" class="btn btn-sm btn-danger float-end">Cancel</a>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h3 class="text-center">HeinShop</h3>

                <div class="row">
                    <div class="col-md-6">
                        <p>Name - {{ $order_first->user->name }}</p>
                        <p>Phone - {{ $order_first->user->phone }}</p>
                        <p>Voucher No - {{ $order_first->voucher_no }}</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <p>Date - {{ $order_first->created_at }}</p>
                        <p>Address - </p>
                        <p>Payment Method - {{ $order_first->payment->name }}</p>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Qty</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                $total = 0;
                            @endphp
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $order->item->name }}</td>
                                    <td>{{ $order->item->price }} MMK</td>
                                    <td>{{ $order->item->discount }}%</td>
                                    <td>{{ $order->qty }}</td>
                                    <td>{{ $order->total }} MMK</td>
                                </tr>
                                @php
                                    $total += $order->total;
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="5">Total</td>
                                <td>{{ $total }} MMK</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="offset-md-4 col-md-4">
                            <img src="{{ $order_first->payment_slip }}" alt="" class="img-fluid">
                        </div>
                        <form action="" class="d-grid gap-2 my-5" method="post">
                        @csrf 
                        @method('put')
                            @if ($order_first->status == 'Pending')
                                <input type="hidden" name="status" value="Accept">
                                <button type="submit" class="btn btn-primary">Order Accept</button>
                            @else
                                <input type="hidden" name="status" value="Complete">
                                <button type="submit" class="btn btn-success">Order Complete</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection