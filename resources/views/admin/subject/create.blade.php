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
        <div class="col-lg-10">

            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Create Subject </h6>
                    </div>
                </div>

                <div class="card-body pb-2">
                    <form method="POST" action="{{ route('admin.subjects.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row  ">
                            <div class="col-lg-6 mb-sm-2">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Subject Code</label>
                                        <input type="text" value="{{ old('subject_code') }}"
                                            class="form-control @error('subject_code') is-invalid @enderror"
                                            name="subject_code" onfocus="focused(this)" onfocusout="defocused(this)">
                                        @error('subject_code')
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
                                        <label class="form-label">Subject Name</label>
                                        <input type="text" value="{{ old('subject_name') }}"
                                            class="form-control @error('subject_name') is-invalid @enderror"
                                            name="subject_name" onfocus="focused(this)" onfocusout="defocused(this)">
                                        @error('subject_name')
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
                                        <label class="form-label">No. Units</label>
                                        <input type="text" value="{{ old('number_of_units') }}"
                                            class="form-control @error('number_of_units') is-invalid @enderror"
                                            name="number_of_units" onfocus="focused(this)" onfocusout="defocused(this)">
                                        @error('number_of_units')
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
                                        <select name="semester"
                                            class="form-control  @error('semester') is-invalid @enderror" id="">
                                            <option value="" selected>Select Option...</option>
                                            <option value="1">1st Semester</option>
                                            <option value="2">2nd Semester</option>
                                        </select>
                                        @error('semester')
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
                                        <textarea class="@error('description') form-control is-invalid @enderror"
                                            name="description" id="" cols="100">{{ old('description') }}
                                        </textarea>
                                        @error('description')
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

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
@section('script')

<input type="hidden" value="{{ config('services.tiny.textarea_key') }}" id="apiKey">
<script src="https://cdn.tiny.cloud/1/x3uqm6e8r6luk8dylyml9zgxn5niqzr7a7r4aofnihstab5o/tinymce/6/tinymce.min.js"
    referrerpolicy="origin">
</script>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Carlo Bactol',
      mergetags_list: [
        { value: 'Carlo', title: 'Carlo' },
        { value: 'carlobactol19@gmail.com', title: 'Email' },
      ]
    });
</script>

@endsection