@extends('layouts.worker')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Milk Added</div>

                    <div class="card-body">
                        <form action="{{ route('milks.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group row">
                                        <label for="degree" class="col-md-4 col-form-label text-md-right">{{ __('Degree') }}</label>

                                        <div class="col-md-6">
                                            <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="{{ old('degree') }}" required autocomplete="degree" autofocus>

                                            @error('degree')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group row">
                                        <label for="liter" class="col-md-4 col-form-label text-md-right">{{ __('Liter') }}</label>

                                        <div class="col-md-6">
                                            <input id="liter" type="text" class="form-control @error('liter') is-invalid @enderror" name="liter" value="{{ old('liter') }}" required autocomplete="liter" autofocus>

                                            @error('liter')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Added') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <table class="table table-striped">
                            <tr>
                                <th>Number</th>
                                <th>Degree</th>
                                <th>Liter</th>
                                <th>Milk cost</th>
                                <th>Total cost</th>
                                <th></th>
                            </tr>
                        @foreach($milks as $milk)
                            <tr>
                                <td>{{$milk->id}}</td>
                                <td>{{$milk->degree}}</td>
                                <td>{{$milk->liter}}</td>
                                <td>{{$milk->cost}}</td>
                                <td>{{$milk->liter * $milk->cost}}</td>
                                <td><a href="{{url('milks', $milk->id)}}" class="btn btn-danger">Add Product</a></td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
