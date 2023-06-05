@extends('layouts.admin')

@section('content')
@if (session('message'))
<div class="row">
    <div class="col-lg-6">
        <div class=" alert alert-success">
            <span class="text-white"> {{ session('message') }}</span>
        </div>
    </div>
</div>
@endif

<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-8">

            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Create Student</h6>
                    </div>
                </div>
                <div class="card-body pb-2">
                    <form method="POST" action="{{ route('admin.teachers.store') }}" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="row">
                            <div class="col-lg-12  mb-sm-2">
                                <div class="ms-md-auto pe-md-3 pe-md-1">
                                    <div class="input-group input-group-outline">
                                        <select name="department_name" id=""
                                            class="form-control @error('department_name') is-invalid @enderror">
                                            <option value="" disabled selected>Select department...</option>
                                            @foreach ($department as $item)
                                            <option {{ old('department')==$item->department_name ? 'selected' :'' }}
                                                value="{{
                                                $item->department_name }}">{{ $item->department_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('department_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- Fname and Lname --}}
                        <div class="row">
                            <div class="col-lg-6 mb-sm-2">
                                <div class="ms-md-auto pe-md-3 pe-md-1">
                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Firstname</label>
                                        <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                            value="{{  old('firstname') }}" name="firstname" onfocus="focused(this)"
                                            onfocusout="defocused(this)">
                                        @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-sm-2">
                                <div class="ms-md-auto pe-md-3 pe-md-1">
                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Lastname</label>
                                        <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                                            value="{{  old('lastname') }}" name="lastname" onfocus="focused(this)"
                                            onfocusout="defocused(this)">
                                        @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Email && Password --}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ms-md-auto pe-md-3 pe-md-1">
                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" name="email" onfocus="focused(this)"
                                            onfocusout="defocused(this)">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                    <div class="input-group input-group-outline">
                                        <label class="form-label">password</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            onfocus="focused(this)" onfocusout="defocused(this)">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="row">
                            <div class="form-group">
                                <div class="form-check form-switch d-flex align-items-center  mt-3">
                                    <input class="form-check-input" type="checkbox" name="status" id="rememberMe"
                                        value="1">
                                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Active</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Save</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')


@endsection