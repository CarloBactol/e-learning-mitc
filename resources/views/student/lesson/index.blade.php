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
                        <h6 class="text-white text-capitalize ps-3">Lessons</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2" style="margin: 0 30px;">
                    <div class="table-responsive my-2">
                        <table class="table align-items-center  mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Chapter</td>
                                    <td>Lesson Name</td>
                                    <td>File</td>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- @php

                                $chkUser = $result->contains('user_id', Auth::user()->id);
                                $category = $categories->contains('id', Auth::user()->id);
                                $true = $result->contains('category_id', $chkCat->id);
                                @endphp --}}


                                @foreach ($lessons as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->chapter }}</td>
                                    <td>{!! Str::limit( $item->lesson_name, 40, "...") !!}</td>
                                    <td><a class="btn btn-success btn-sm"
                                            href=" {{ asset('file/uploads/'.$item->file )}}">Download Lesson</a></td>
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