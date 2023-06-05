@extends('layouts.admin')

@section('content')
<div class="container-fluid">

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



    <!-- Content Row -->

    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">

                <div
                    class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                    <h6 class="text-white text-capitalize ps-3">Update Question</h6>
                    <a title="Add New" href="{{ route('admin.questions.index') }}"><i class="fas fa-arrow-left"
                            style="color: #fff; font-size: 20px; font-weight: bold; margin-right: 20px;"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body pb-2">
            <form action="{{ route('admin.questions.update', $question->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="row">
                    <div class="col-lg-6 mb-sm-2">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                            <div class="input-group input-group-outline">
                                <input type="text" class="form-control @error('question_text') is-invalid @enderror"
                                    value="{{ old('question_text', $question->question_text) }}" name="question_text"
                                    placeholder="Question name" onfocus="focused(this)" onfocusout="defocused(this)">
                                @error('question_text')
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
                                <select class="form-control @error('category_id') is-invalid @enderror"
                                    name="category_id" id="category">
                                    @foreach($categories as $id => $category)
                                    <option {{ $id==$question->category->id ? 'selected' : null }} value="{{ $id }}">{{
                                        $category }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('category_id')
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