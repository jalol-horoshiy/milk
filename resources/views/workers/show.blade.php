@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{url('workers/edit',$user->id)}}" class="btn btn-warning">Edit</a>
            <a href="{{url('workers/delete',$user->id)}}" class="btn btn-danger">Delete</a>
            <table class="table table-striped mt-3">
                <tr>
                    <th>Full Name</th>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <th>Login</th>
                    <td>{{$user->username}}</td>
                </tr>
                <tr>
                    <th>Job</th>
                    <td>{{($user->role == 0) ? "Administrator" : ($user->role == 1 ? "Seller" : "Worker" )}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
