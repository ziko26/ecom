@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        @include('layouts.sidebar')
        </div>
        <div class="col-md-8">
            <div class="card p-3">
                <h3 class="card-tilte">Add Product</h3>
                <div class="card-body">
                    <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="title" placeholder="Title" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="description" placeholder="Description" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" name="price" placeholder="Price" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="number" name="old_price" placeholder="Old Price" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="number" name="inStock" placeholder="Quantity In Stock" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <select name="category_id" class="form-control">
                                <option value="" selected disabled>Choose the category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
