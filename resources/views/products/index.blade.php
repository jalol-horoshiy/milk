@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <a class="btn btn-primary mb-2" href="{{url('products/create')}}">Create product</a>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Count</th>
                    <th>Cost</th>
                    <th>Image</th>
                    <th></th>
                </tr>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->count}}</td>
                        <td>{{$product->cost}}</td>
                        <td><img src="storage/{{$product->image}}" alt="" style="width: 100px"></td>
                        <td>
                            <a class="btn btn-info" href="{{url('products', $product->id)}}">View</a>
                            <a class="btn btn-warning" href="{{url('products/edit', $product->id)}}">Edit</a>
                            <a class="btn btn-danger" href="{{url('products/delete', $product->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
            </table>
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
