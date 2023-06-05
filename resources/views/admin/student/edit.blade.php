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
@if (session('messageErr'))
<div class="row">
    <div class="col-lg-6">
        <div class=" alert alert-info alert-sm" id="errorAlert">
            <span class="text-white"> {{ session('messageErr') }}</span>
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
                        <h6 class="text-white text-capitalize ps-3">Edit Student</h6>
                    </div>
                </div>
                <div class="card-body pb-2">
                    <form method="POST" action="{{ route('admin.students.update', $student->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-lg-12 mb-sm-2">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                    <div class="input-group input-group-outline">
                                        {{-- <label class="form-label">ID Number</label> --}}
                                        <input type="text" class="form-control @error('id_number') is-invalid @enderror"
                                            value="{{  $student->id_number }}" name="id_number" onfocus="focused(this)"
                                            placeholder="ID Number" onfocusout="defocused(this)">
                                        @error('id_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                        </div>

                        {{-- Fname and Lname --}}
                        <div class="row">
                            <div class="col-lg-6 mb-sm-2">
                                <div class="ms-md-auto pe-md-3 pe-md-1">
                                    <div class="input-group input-group-outline">
                                        {{-- <label class="form-label">Firstname</label> --}}
                                        <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                            value="{{  $student->firstname }}" name="firstname" onfocus="focused(this)"
                                            placeholder="Firstname" onfocusout="defocused(this)">
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
                                        {{-- <label class="form-label">Lastname</label> --}}
                                        <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                                            value="{{  $student->lastname }}" name="lastname" onfocus="focused(this)"
                                            placeholder="Lastname" onfocusout="defocused(this)">
                                        @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Course && Section --}}
                        <div class="row">
                            <div class="col-lg-6  mb-sm-2">
                                <div class="ms-md-auto pe-md-3 pe-md-1">
                                    <div class="input-group input-group-outline">
                                        <select name="course" id=""
                                            class="form-control @error('course') is-invalid @enderror">
                                            <option value="{{ $student->course }}" selected>{{ $student->course
                                                }}</option>
                                            @foreach ($course as $item)
                                            @if ($item->course != $student->course)
                                            <option {{ old('course')==$item->course ? 'selected' :'' }} value="{{
                                                $item->course }}">{{ $item->course }}
                                            </option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('course')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6  mb-sm-2">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                    <div class="input-group input-group-outline">
                                        <select name="section" id=""
                                            class="form-control @error('section') is-invalid @enderror">
                                            <option value="{{ $student->section }}" selected>{{
                                                $student->section
                                                }}</option>
                                            @foreach ($section as $item)
                                            @if ($item->section != $student->section)
                                            <option {{ old('section')==$item->section ? 'selected' :'' }} value="{{
                                                $item->section }}">{{ $item->section }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('section')
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
                            <div class="col-lg-6  mb-sm-2">
                                <div class="ms-md-auto pe-md-3 pe-md-1">
                                    <div class="input-group input-group-outline">
                                        {{-- <label class="form-label">Email</label> --}}
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            value="{{  $student->email }}" name="email" onfocus="focused(this)"
                                            placeholder="Email" onfocusout="defocused(this)">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6  mb-sm-2">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                    <div class="input-group input-group-outline">
                                        {{-- <label class="form-label">password</label> --}}
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            onfocus="focused(this)"
                                            placeholder="Check Password | Default Password is ID Number"
                                            onfocusout="defocused(this)">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-warning w-100 btn-md" href="{{ route('password.request') }}">
                                            {{ __('Change Password?') }}
                                        </a>
                                        @endif --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="row">
                            <div class="form-group">
                                <div class="form-check form-switch d-flex align-items-center  mt-3">
                                    <input class="form-check-input" type="checkbox" name="status" id="rememberMe" {{
                                        $student->status == 1 ? 'checked' : '' }}
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
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {

        $(".alert").show("slow").delay(3000).hide("slow");
        $("#errorAlert").show("slow").delay(5000).hide("slow");
    } );
</script>

@endsection