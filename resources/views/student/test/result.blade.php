@extends('layouts.student')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span> Results of your test</span>
                    <a class="btn btn-info btn-sm float-end" href="{{ route('students.test') }}">Back to Class
                        Activity</a>
                </div>

                <div class="card-body">
                    <p class="mt-5">Total points: {{ $result->total_points }} points</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Question Name</th>
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
    </div>
</div>
@endsection