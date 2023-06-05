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
                        <h6 class="text-white text-capitalize ps-3">Edit Course </h6>

                    </div>
                </div>
                <div class="card-body pb-2">
                    <form method="POST" action="{{ route('admin.courses.update', $course->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <div class="row  ">
                            <div class="col-lg-12 mb-sm-2">

                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                                    <div class="input-group input-group-outline">
                                        {{-- <label class="form-label">Course Name</label> --}}
                                        <input type="text" value="{{ $course->course}}"
                                            class="form-control @error('course') is-invalid @enderror" name="course"
                                            placeholder="Course" onfocus="focused(this)" onfocusout="defocused(this)">
                                        @error('course')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>



                                </div>
                            </div>
                            {{-- <div class="col-lg-6 mb-sm-2">

                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                    <div class="input-group input-group-outline">
                                        <input type="text" value="{{ $course->section}}"
                                            class="form-control @error('section') is-invalid @enderror" name="section"
                                            placeholder="Section" onfocus="focused(this)" onfocusout="defocused(this)">
                                        @error('section')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div> --}}
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="form-check form-switch d-flex align-items-center  mt-3">
                                    <input class="form-check-input" type="checkbox" name="status" id="rememberMe" {{
                                        $course->status == 1 ? 'checked' : '' }}
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