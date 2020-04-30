@extends('layouts.seller')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Sell number #{{$history->id}}
                </div>
                <div class="card-body">
                    <div class="row">
                    @foreach($history->history_items as $item)
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="/storage/{{$item->product_type->image}}" alt="" style="width: 100%">
                                    </div>
                                    <div class="col-6">
                                        <table class="table">
                                            <tr>
                                                <td><b>Name: </b> {{$item->product_type->name}} </td>
                                            </tr>
                                            <tr>
                                                <td><b>Count: </b> {{$item->count}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Cost: </b> {{$item->cost}} </td>
                                            </tr>
                                            <tr>
                                                <td><b>Total: </b> {{$item->cost * $item->count}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <h6><b>Seller:</b> {{$history->seller->name}}</h6>
                    <h6><b>Date:</b> {{$history->created_at}}</h6>
                    <h6><b>Total cost: </b> {{$history->total_cost}}</h6>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
