@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <a class="btn btn-primary mb-2" href="{{url('sellers/create')}}">Create Seller</a>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>login</th>
                    <th></th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->username}}</td>
                        <td>

                            <a class="btn btn-info" href="{{url('sellers', $user->id)}}">View</a>
                            <a class="btn btn-warning" href="{{url('sellers/edit', $user->id)}}">Edit</a>
                            <a class="btn btn-danger" href="{{url('sellers/delete', $user->id)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
