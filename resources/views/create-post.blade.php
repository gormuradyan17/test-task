@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ __('New Post') }}</span>
                        <button class="btn btn-light">
                            <a class="text-decoration-none text-dark"
                               href="{{ redirect()->back()->getTargetUrl() }}">{{ __('Back') }}</a>
                        </button>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ __('Title') }}</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" name="title"
                                       placeholder="Title" required>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">{{ __('Description') }}</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2"
                                          placeholder="Description..."
                                          name="description">
                            </div>

                            <div class="form-group mb-4">
                                <label for="exampleFormControlFile1">Images</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                       name="images[]"
                                       multiple>
                            </div>

                            <button class="btn btn-primary float-right" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
