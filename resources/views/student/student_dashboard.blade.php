@extends('layouts.student')

@section('content')
@if (session('status'))
<div class="col-md-6">
    <div class="alert alert-info" role="alert">
        {{ session('status') }}
    </div>
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Student Dashboard') }}</div>

                <div class="card-body">
                    <small>Welcome back to {{ __('Student Dashboard') }} {{ " " }} <span class="text-primary">{{
                            Auth::user()->name }}</span> </small>
                    <small class="spinner-grow text-success" role="status" style="height: 12px; width: 12px">
                    </small><span class="text-success">Online</span>
                </div>
                <hr>
                <div class="card-footer">
                    <p>Course: {{ Auth::user()->course}}</p>
                    <p>Section: {{ Auth::user()->section}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
        $(".alert").show("slow").delay(3000).hide("slow");
    } );
</script>

@endsection