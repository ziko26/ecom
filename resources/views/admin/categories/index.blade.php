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
                    <th>Slug</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->slug}}</td>
                        <td class="d-flex justify-content-center align-items-center">
                        <a href="{{route('categories.edit', $category->slug)}}"
                             class="btn btn-sm btn-warning mr-2"><fa class="fa fa-edit"></fa>
                        </a>
                        <form id="{{$category->id}}" method="post" action="{{route('categories.destroy', $category->slug)}}">
                            @csrf
                            @method('DELETE')
                                <button onclick="event.preventDefault();
                                if(confirm('Do you want Delete category {{$category->title}} ?'))
                                document.getElementById({{$category->id}}).submit();"
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
                    {{$categories->links()}}
                </div>
        </div>
    </div>
</div>
@endsection
