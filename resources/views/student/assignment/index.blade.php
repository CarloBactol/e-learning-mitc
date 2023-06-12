@extends('layouts.student')
@section('content')
@if (session('status'))
<div class="row">
    <div class="col-lg-6">
        <div class=" alert alert-success">
            <span class="text-white"> {{ session('status') }}</span>
        </div>
    </div>
</div>
@endif
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-10">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div
                        class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Assignment</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2" style="margin: 0 30px;">
                    <div class="table-responsive my-2">
                        <table class="table align-items-center  mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Assignment Name</td>
                                    <td>Class</td>
                                    <td>Action</td>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($assignment as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->assignment_name }}</td>
                                    <td>{{ $item->course. '-'. $item->section }}</td>
                                    <td>
                                        @if (!in_array($item->id, $result))
                                        <a class="btn btn-sm btn-info float-start "
                                            href="{{ route('student_assignments.show', $item->id) }}"><i
                                                class="fa fa-edit"></i></a>
                                        @else
                                        <button class="btn btn-success btn-sm" disabled><i
                                                class="fa fa-check"></i></button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>


                        </table>

                    </div>
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