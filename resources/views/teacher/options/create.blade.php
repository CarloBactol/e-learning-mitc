@extends('layouts.teacher')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8" style="margin: 0 auto;">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">

                        <div
                            class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                            <h6 class="text-white text-capitalize ps-3">Create Question</h6>
                            {{-- <a title="Add New" href="{{ route('teacher.teacher_options.index') }}"><i
                                    class="fas fa-arrow-left"
                                    style="color: #fff; font-size: 20px; font-weight: bold; margin-right: 20px;"></i></a>
                            --}}
                            <a href="{{  route('teacher.teacher_options.index')  }}" class="btn btn-primary mx-2">
                                <span class="icon text-white-50">
                                    <i class="fa fa-arrow-left"></i>
                                </span>
                                <span class="text">{{ __('Back') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-2">
                    <form action="{{  route('teacher.teacher_options.store')}}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6 mb-sm-2">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Option Name</label>
                                        <input type="text"
                                            class="form-control @error('option_text') is-invalid @enderror"
                                            name="option_text" onfocus="focused(this)" onfocusout="defocused(this)">
                                        @error('option_text')
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
                                        <label class="form-label">Option Points</label>
                                        <input type="text" class="form-control @error('points') is-invalid @enderror"
                                            name="points" onfocus="focused(this)" onfocusout="defocused(this)">
                                        @error('points')
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
                                        <select class="form-control" name="question_id" id="question">
                                            <option value="" selected disabled>Select question..</option>
                                            @foreach($questions as $id => $question)
                                            <option value="{{ $id }}">{{ $question }}</option>
                                            @endforeach
                                        </select>
                                        @error('question_id')
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

</div>
@endsection