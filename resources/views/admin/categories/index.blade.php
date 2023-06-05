@extends('layouts.admin')

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
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card">
        <div class="card-header py-3 d-flex">

            <div class="ml-auto">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">{{ __('New category') }}</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-category"
                    cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Section</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr data-entry-id="{{ $category->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                {{ $category->course }}
                            </td>
                            <td>{{ $category->section }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form onclick="return confirm('are you sure ? ')" class="d-inline"
                                        action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"
                                            style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>


                        @empty
                        <tr>
                            <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Content Row -->
    <div class="modal fade" id="modalUpload" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload To:</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="POST" id="formData">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-8" style="margin: 0 auto;">

                            </div>
                        </div>
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            {{-- <input type="hidden" value={{ $category->id }} id="catId"> --}}

                            <div class="input-group input-group-outline">
                                <select name="course" id="" class="form-control @error('course') is-invalid @enderror">
                                    <option value="" selected disabled>Select course..</option>
                                    @foreach ($class as $item)
                                    <option value="{{ $item->id }}">{{ $item->course }}</option>
                                    @endforeach
                                </select>
                                @error('course')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" type="submit" class="btn btn-primary" id="btnSaveUpload">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@push('script-alt')
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        let deleteButtonTrans = 'delete selected'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.categories.mass_destroy') }}",
            className: 'btn-danger',
            action: function (e, dt, node, config) {
            var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                return $(entry).data('entry-id')
            });
            if (ids.length === 0) {
                alert('zero selected')
                return
            }
            if (confirm('are you sure ?')) {
                $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: 'POST',
                url: config.url,
                data: { ids: ids, _method: 'DELETE' }})
                .done(function () { location.reload() })
            }
            }
        }
        dtButtons.push(deleteButton)
        $.extend(true, $.fn.dataTable.defaults, {
            order: [[ 1, 'asc' ]],
            pageLength: 50,
        });
        $('.datatable-category:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
})


</script>
@endpush
{{-- @section('script')
// Modal
<script>
    $(document).ready(function () {
        $(document).on('click', '.btnUpload', function () {
                $("#modalUpload").modal('show');

            });

            $(document).on("click", '#btnSaveUpload', function () {
                var data = $('#formData').serializeArray();
                    data.push({
                    name: 'course',
                    value: $('select option:selected').text()
                    });
                    var id = $(".btnUpload").val()

                    console.log(id);
                    let courseID = data[0].value
                    $.ajax({
                        method: 'GET',
                        url: "/categories_upload_course/"+id,
                        data: courseID,
                        success: function (response) {
                            alert(response.message);
                        }
                    });

            });
   });
</script>
@endsection --}}