@extends('layouts.teacher')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Teacher Dashboard') }}</div>

                <div class="card-body">
                    <div class="card-body">
                        <small>Welcome back to {{ __('Teacher Dashboard') }} {{ " " }} <span class="text-primary">{{
                                Auth::user()->name }}</span> </small>
                        <small class="spinner-grow text-success" role="status" style="height: 12px; width: 12px">
                        </small><span class="text-success">Online</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection