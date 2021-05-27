@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ __('Users') }}</span>
                        <button class="btn btn-light">
                            <a class="text-decoration-none text-dark"
                               href="{{route('users.create')}}">{{ __('New User') }}</a>
                        </button>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Age</th>
                                <th scope="col">Address</th>
                                <th scope="col">Posts</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->age}}</td>
                                    <td>{{$user->address}}</td>
                                    <td class="text-center">
                                        <span class="badge badge-primary">{{$user->posts_count}}</span>
                                    </td>
                                    <td>
                                        @if($user->status)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <form action="{{route('users.destroy', $user->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete"/>
                                            <button type="submit" class="btn btn-danger small">Delete</button>
                                        </form>

                                        <button class=" ml-3 btn btn-primary ">
                                            <a href="{{route('users.edit', $user->id)}}"
                                               class="text-decoration-none text-light">
                                                Update
                                            </a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
