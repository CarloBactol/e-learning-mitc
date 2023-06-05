@extends('layouts.teacher')

@section('content')

<div class="container">
    <div class="col-md-8" style="margin: 0 auto;">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">

                    <div
                        class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Create Lesson</h6>
                        <a title="Add New" href="{{ route('teacher.teacher_lessons.index') }}"><i
                                class="fas fa-arrow-left"
                                style="color: #fff; font-size: 20px; font-weight: bold; margin-right: 20px;"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body pb-2">
                <form action="{{ route('teacher.teacher_lessons.update',$lessons->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-4 mb-sm-2">

                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                                <div class="input-group input-group-outline">
                                    <input type="text" value="{{  $lessons->chapter }}" placeholder="Chapter"
                                        class="form-control @error('chapter') is-invalid @enderror" name="chapter"
                                        onfocus="focused(this)" onfocusout="defocused(this)">
                                    @error('chapter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-sm-2">

                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                                <div class="input-group input-group-outline">
                                    <select name="course" id=""
                                        class="form-control @error('course') is-invalid @enderror">
                                        <option value="{{ $lessons->course }}" selected>{{ $lessons->course
                                            }}</option>
                                        @foreach ($class as $item)
                                        @if ($item->course != $lessons->course)
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
                        <div class="col-lg-4 mb-sm-2">

                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                                <div class="input-group input-group-outline">
                                    <select name="section" id=""
                                        class="form-control @error('section') is-invalid @enderror">
                                        <option value="{{ $lessons->section }}" selected>{{ $lessons->section
                                            }}</option>
                                        @foreach ($section as $item)
                                        @if ($item->section != $lessons->section)
                                        <option {{ old('section')==$item->section ? 'selected' :'' }} value="{{
                                            $item->section }}">{{ $item->section }}
                                        </option>
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
                    <div class="row">
                        <div class="col-lg-12 mb-sm-2">

                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group input-group-outline">

                                    <input type="text" value="{{  $lessons->lesson_name }}" placeholder="Lesson Name"
                                        class="form-control @error('lesson_name') is-invalid @enderror"
                                        name="lesson_name" onfocus="focused(this)" onfocusout="defocused(this)">
                                    @error('lesson_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-sm-2">

                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <a class="btn btn-success btn-sm" href="{{ asset('file/uploads/'.$lessons->file) }}"
                                    download>View Current File</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-sm-2">
                            <span>New File</span>
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group input-group-outline">
                                    <input type="file" class="form-control @error('file') is-invalid @enderror"
                                        name="file">
                                    @error('file')
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