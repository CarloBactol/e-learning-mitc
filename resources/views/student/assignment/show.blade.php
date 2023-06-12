@extends('layouts.student')
@section('content')
@if(session('status'))
<div class="row">
    <div class="col-12">
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    </div>
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header">Submit Assignment</h4>

                <div class="card-body">
                    <form method="POST" action="{{ route('student_assignments.store') }}">
                        @csrf
                        <input type="hidden" name="assignment_id" value="{{  $assignment->id}}">
                        <input type="hidden" name="assignment_name" value="{{  $assignment->assignment_name}}">
                        <input type="hidden" name="class" value="{{  $assignment->course. '-'.$assignment->section}}">

                        <div class="form-group">
                            <label for="">Answer: Google Drive URL</label>
                            <input type="text"
                                class="form-control shadow border px-2  @error('answer') is-invalid @enderror"
                                name="answer" value="" placeholder="Make sure it's not broken link!">
                            @error('answer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection