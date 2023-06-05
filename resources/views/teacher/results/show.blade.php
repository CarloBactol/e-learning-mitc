@extends('layouts.teacher')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card">
        <div class="card-header py-3 d-flex">

            <div class="float-end">
                <a href="{{ route('teacher.teacher_results.index') }}" class="btn btn-primary">
                    <span class="text">{{ __('Go Back') }}</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <h6 class="m-0 font-weight-bold text-primary">
                Total points: {{ $result->total_points }} points
            </h6>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Question Text</th>
                            <th>Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result->questions as $question)
                        <tr>
                            <td>{{ $question->question_text }}</td>
                            <td>{{ $question->pivot->points }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Content Row -->

</div>
@endsection