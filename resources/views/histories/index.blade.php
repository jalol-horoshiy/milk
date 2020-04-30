<script>
    function added() {
        var x = document.querySelectorAll('input[type="number"]');
        var sum = 0;
        for(var i of x){
            sum += Number(i.value) * i.dataset.cost;
        }
        document.getElementById('total').innerHTML = sum;
    }
</script>

@extends('layouts.seller')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Sell products</div>

                    <div class="card-body">
                        <form action="{{ route('histories.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row">
                                @foreach($products as $product)
                                    <div class="col-3">
                                        <h5 style="text-align: center">{{$product->name}} ({{$product->cost}} sum)</h5>
                                        <img src="storage/{{$product->image}}" alt="" style="width: 100%; height: 180px">
                                        <div class="input-group input-group-sm mt-2">
                                            <input type="number" class="form-control" data-cost="{{$product->cost}}" min="0" max="{{$product->count}}" name="{{$product->id}}" onblur="added()">
                                            <div class="input-group-append">
                                                <span class="input-group-text">max {{$product->count}}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row mt-4">
                                <h5 class="ml-3"><b>Total:</b> <span id="total">0</span> sum</h5>
                                <div class="form-group mb-0 ml-auto mr-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Buy products') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Total Cost</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            @foreach($histories as $history)
                                <tr>
                                    <td>{{$history->id}}</td>
                                    <td>{{$history->total_cost}}</td>
                                    <td>{{$history->created_at}}</td>
                                    <td>

                                        <a class="btn btn-info" href="{{url('histories', $history->id)}}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $histories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
