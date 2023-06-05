@extends('layouts.admin')

@section('content')
@if (session('messageErr'))
<div class="row">
    <div class="col-lg-6">
        <div class="alert alert-warning" id="errorAlert">
            <span class="text-white"> {{ session('messageErr') }}</span>
        </div>
    </div>
</div>
@endif
@if (session('status'))
<div class="row">
    <div class="col-lg-6">
        <div class="alert alert-success" id="successAlert">
            <span class="text-white"> {{ session('status') }}</span>
        </div>
    </div>
</div>
@endif
<div class="container-fluid">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div
                        class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Student Records</h6>
                        <a title="Add New" href="{{ route('admin.students.create') }}"><i class="fas fa-plus"
                                style="color: #fff; font-size: 20px; font-weight: bold; margin-right: 20px;"></i></a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2" style="margin: 0 30px;">
                    <div class="table-responsive my-2">
                        <table class="table align-items-center  mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Id Number</td>
                                    <td>Course</td>
                                    <td>Section</td>
                                    <td>Firstname</td>
                                    <td>Lastname</td>
                                    <td>Email</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($student as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->id_number }}</td>
                                    <td>{{ $item->course }}</td>
                                    <td>{{ $item->section }}</td>
                                    <td>{{ Str::ucfirst($item->firstname) }}</td>
                                    <td>{{ str::ucfirst($item->lastname )}}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="{{ $item->status == '1' ? 'text-success' : 'text-danger' }}">{{
                                        $item->status == '1' ? 'Active' : 'Disabled' }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info float-start"
                                            href="{{ route('admin.students.edit', $item->id) }}"><i
                                                class="fa fa-edit"></i></a>
                                        <form method="post" action="{{ route('admin.students.destroy', $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-start"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
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
        $("#successAlert").show("slow").delay(3000).hide("slow");
        $("#errorAlert").show("slow").delay(5000).hide("slow");
    } );
</script>

@endsection