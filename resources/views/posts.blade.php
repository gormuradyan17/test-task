@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ __('Posts') }}</span>
                        <button class="btn btn-light">
                            <a class="text-decoration-none text-dark"
                               href="{{route('posts.add')}}">{{ __('New Post') }}</a>
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
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Author</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th scope="row">{{$post->id}}</th>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->description}}</td>
                                    <td>{{$post->author->name}}</td>
                                    @if(auth()->id() === $post->author->id)
                                        <td class="d-flex">
                                            <form action="{{route('posts.delete', $post->id)}}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="delete"/>
                                                <button type="submit" class="btn btn-danger small">Delete</button>
                                            </form>

                                            <button class=" ml-3 btn btn-primary ">
                                                <a href="{{route('posts.edit', $post->id)}}"
                                                   class="text-decoration-none text-light">
                                                    Update
                                                </a>
                                            </button>
                                        </td>
                                    @endif
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
