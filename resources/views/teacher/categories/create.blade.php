@extends('layouts.teacher')

@section('content')
<div class="container">

    <!-- Page Heading -->
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="col-md-8" style="margin: 0 auto;">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">

                    <div
                        class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Create Category</h6>
                        <a title="Add New" href="{{ route('teacher.teacher_categories.index') }}"><i
                                class="fas fa-arrow-left"
                                style="color: #fff; font-size: 20px; font-weight: bold; margin-right: 20px;"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body pb-2">
                <form action="{{ route('teacher.teacher_categories.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-lg-12 mb-sm-2">

                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                                <div class="input-group input-group-outline">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" onfocus="focused(this)" onfocusout="defocused(this)">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-sm-2">

                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                                <div class="input-group input-group-outline">
                                    <select name="course" class="form-control @error('course') is-invalid @enderror">
                                        <option value="" selected disabled>Select course..</option>
                                        @foreach ($class as $item)
                                        <option value="{{ $item->course }}">{{ $item->course }}</option>
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
                        <div class="col-lg-6 mb-sm-2">

                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                                <div class="input-group input-group-outline">
                                    <select name="section" class="form-control @error('section') is-invalid @enderror">
                                        <option value="" selected disabled>Select section..</option>
                                        @foreach ($section as $item)
                                        <option value="{{ $item->section }}">{{ $item->section }}</option>
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

                    <div class="row">
                        <div class="form-group">
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
@endsection