@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        @include('layouts.sidebar')
        </div>
        <div class="col-md-8">
            <div class="card p-3">
                <h3 class="card-tilte">Add Category</h3>
                <div class="card-body">
                    <form method="post" action="{{route('categories.store')}}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="title" placeholder="Title" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="slug" placeholder="Slug" class="form-control">
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
