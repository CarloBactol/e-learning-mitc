@extends('layouts.teacher')

@section('content')
<div class="container-fluid">

    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">

                <div
                    class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                    <h6 class="text-white text-capitalize ps-3">Create Question</h6>
                    <a title="Add New" href="{{ route('teacher.teacher_options.index') }}"><i class="fas fa-arrow-left"
                            style="color: #fff; font-size: 20px; font-weight: bold; margin-right: 20px;"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body pb-2">
            <form action="{{ route('teacher.teacher_options.update', $option->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-6 mb-sm-2">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                            <div class="input-group input-group-outline">
                                <input type="text" class="form-control @error('option_text') is-invalid @enderror"
                                    placeholder="Option name" name="option_text"
                                    value="{{  old('option_text', $option->option_text) }}" onfocus="focused(this)"
                                    onfocusout="defocused(this)">
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

                                <input type="text" class="form-control @error('points') is-invalid @enderror"
                                    placeholder="Points" value="{{ old('points', $option->points) }}" name="points"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
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
                                    @foreach($questions as $id => $question)
                                    <option {{ $id==$option->question->id ? 'selected' : null }} value="{{ $id }}">{{
                                        $question }}
                                    </option>
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
@endsection