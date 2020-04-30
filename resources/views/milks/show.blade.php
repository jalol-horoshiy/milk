@extends('layouts.worker')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table table-striped mt-3">
                <tr>
                    <th>Number</th>
                    <td>{{$milk->id}}</td>
                </tr>
                <tr>
                    <th>Degree</th>
                    <td>{{$milk->degree}}</td>
                </tr>
                <tr>
                    <th>Cost</th>
                    <td>{{$milk->cost}}</td>
                </tr>
                <tr>
                    <th>Liter</th>
                    <td>{{$milk->liter}}</td>
                </tr>
                <tr>
                    <th>Total Cost</th>
                    <td>{{$milk->cost * $milk->liter}} </td>
                </tr>
            </table>
        </div>

    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{$milk->id}}-milk products
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('mproducts.update' , $milk->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        <table class="table table-striped">
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td><img src="/storage/{{$product->image}}" alt="" style="height: 70px"></td>
                                    @csrf
                                    @if($milk->milk_products->where('product_type_id' , $product->id)->first() != null)
                                        <td><input type="number" value="{{$milk->milk_products->where('product_type_id' , $product->id)->first()->count}}" name="{{$product->id}}"></td>
                                    @else
                                        <td><input type="number" value="0" name="{{$product->id}}"></td>
                                    @endif
                            </tr>
                        @endforeach
                    </table>
                        <div class="form-group row float-right mr-4">
                            <button type="submit" class="btn btn-primary ">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
