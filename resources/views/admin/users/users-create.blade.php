@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ __('New User') }}</span>
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

                        <form action="{{route('users.store')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="formGroupExampleInput">{{ __('First Name') }}</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="first_name"
                                           placeholder="First Name" required>
                                </div>
                                <div class="col">

                                    <label for="formGroupExampleInput2">{{ __('Last Name') }}</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                           placeholder="Last Name"
                                           name="last_name" required>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="formGroupExampleInput2">{{ __('Email') }}</label>
                                <input type="email" class="form-control" id="formGroupExampleInput2"
                                       placeholder="Email"
                                       name="email" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="formGroupExampleInput2">{{ __('Age') }}</label>
                                    <input type="number" class="form-control" id="formGroupExampleInput2"
                                           placeholder=""
                                           name="age">
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="formGroupExampleInput2">{{ __('Address') }}</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                           placeholder="Address"
                                           name="address">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                                               value="1">
                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                                               value="0">
                                        <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                    </div>
                                </div>
                            </div>


                            <button class="btn btn-primary float-right" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
