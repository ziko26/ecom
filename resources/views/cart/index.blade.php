@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 card p-3">
            <h4 class="text-dark">Your Cart</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>price</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td><img src="{{asset($item->associatedModel->image)}}"
                                     alt="{{$item->title}}"
                                     width="50" height="50"
                                     class="img-fluid rounded"></td>
                            <td>{{$item->name}}</td>
                            <td>
                            <form class="d-flex flex-row justify-content-center align-items-center" method="post" action="{{route('cart.update', $item->associatedModel->slug)}}">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <input type="number" name="qty" id="qty" 
                                        value="{{$item->quantity}}"
                                        placeholder="Quantity"
                                        max="{{$item->associatedModel->inStock}}"
                                        min="1"
                                        class="form-control">

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </form>
                            </td>  
                            <td>{{$item->price}} MAD</td> 
                            <td>{{$item->price * $item->quantity}} MAD</td>
                            <td>
                            <form class="d-flex flex-row justify-content-center align-items-center" method="post" action="{{route('cart.remove', $item->associatedModel->slug)}}">
                                @csrf
                                @method("DELETE")
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </form>
                            </td>      
                        </tr>
                    @endforeach
                    <tr class="text-dark font-weight-bold">
                        <td colspan="3" class="border border-success">Total :</td>
                        <td colspan="3" class="border border-success">
                            {{Cart::getSubtotal()}} MAD
                        </td>
                    <tr>
                </tbody>
            </table>
            @if(Cart::getSubtotal() > 0)
                <div class="form-group">
                 <a href="{{route('make.payment')}}" class="btn btn-primary mt-3">
                    Pay {{Cart::getSubtotal()}} MAD via Paypal
                 </a>
                </div>
            @endif
           
        </div>
    </div>
</div>
@endsection
