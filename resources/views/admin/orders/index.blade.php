@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-8">
            <table class="table table-hover text-center">
                <thead>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Products</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Paid</th>
                    <th>Delevred</th>
                    <th>Actions</th>

                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->product_name}}</td>
                        <td>{{$order->qty}}</td>
                        <td>{{$order->price}} MAD</td>
                        <td>{{$order->total}} MAD</td>
                        <td>
                            @if($order->paid)
                            <i class="fa fa-check text-success"></i>
                            @else
                            <i class="fa fa-times text-danger"></i>
                            @endif
                        </td>
                        <td>
                            @if($order->delevered)
                            <i class="fa fa-check text-success"></i>
                            @else
                            <i class="fa fa-times text-danger"></i>
                            @endif
                        </td>
                        <td class="d-flex justify-content-center align-items-center">
                            <form method="post" action="{{route('orders.update', $order->id)}}">
                            @csrf
                            @method('PUT')
                                <button class="btn btn-sm btn-success"><fa class="fa fa-check"></fa></button>
                            </form>
                            <form id="{{$order->id}}" method="post" action="{{route('orders.destroy', $order->id)}}">
                            @csrf
                            @method('DELETE')
                                <button onclick="event.preventDefault();
                                if(confirm('Do you want Delete Order #{{$order->id}} ?'))
                                document.getElementById({{$order->id}}).submit();"
                                 class="btn btn-sm btn-danger"><fa class="fa fa-trash"></fa>
                                 </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
                <div class="justify-content-center d-flex">
                    {{$orders->links()}}
                </div>
        </div>
    </div>
</div>
@endsection
