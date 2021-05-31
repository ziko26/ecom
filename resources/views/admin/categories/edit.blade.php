@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        @include('layouts.sidebar')
        </div>
        <div class="col-md-8">
            <div class="card p-3">
                <h3 class="card-tilte">Edit Category</h3>
                <div class="card-body">
                    <form method="post" action="{{route('categories.update', $category->slug)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" name="title" value="{{$category->title}}" placeholder="Title" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="slug" value="{{$category->slug}}" placeholder="Slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
