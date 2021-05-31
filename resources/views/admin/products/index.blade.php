@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
         @include('layouts.sidebar')
        </div>
        <div class="col-md-8">
        <a href="{{route('products.create')}}"
           class="btn btn-sm btn-primary my-2"><i class="fa fa-plus"></i> Add Product
        </a>
        <a href="{{route('categories.create')}}"
           class="btn btn-sm btn-success my-2"><i class="fa fa-plus"></i> Add Category
        </a>
            <table class="table table-hover text-center">
                <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>In Stock</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Actions</th>

                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{ Str::limit($product->description, 50)}}</td>
                        <td>{{$product->inStock}}</td>
                        <td>{{$product->price}} MAD</td>
                        <td>
                            @if($product->inStock > 0)
                            <i class="fa fa-check text-success"></i>
                            @else
                            <i class="fa fa-times text-danger"></i>
                            @endif
                        </td>
                        <td>
                          <img src="{{ asset($product->image) }}"
                               alt="{{$product->title}}"
                               width="50"
                               height="50"
                               class="img-fluid rounded">
                        </td>
                        <td>{{$product->category->title}}</td>
                        <td class="d-flex justify-content-center align-items-center">
                        <a href="{{route('products.edit', $product->slug)}}"
                             class="btn btn-sm btn-warning mr-2"><fa class="fa fa-edit"></fa>
                        </a>
                        <form id="{{$product->id}}" method="post" action="{{route('products.destroy', $product->slug)}}">
                            @csrf
                            @method('DELETE')
                                <button onclick="event.preventDefault();
                                if(confirm('Do you want Delete product {{$product->title}} ?'))
                                document.getElementById({{$product->id}}).submit();"
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
                    {{$products->links()}}
                </div>
        </div>
    </div>
</div>
@endsection
