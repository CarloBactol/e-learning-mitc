@extends('layouts.teacher')

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

    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-10">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div
                            class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3 d-flex justify-content-between">

                            <a href="{{ route('teacher.teacher_lessons.create') }}" class="btn btn-primary mx-2">
                                <span class="icon text-white-50">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">{{ __('Upload Lesson') }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2" style="margin: 0 30px;">
                        <div class="table-responsive my-2">
                            <table class="table align-items-center  mb-0" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Chapter</th>
                                        <th>Lesson Name</th>
                                        <th>Upload To</th>
                                        <th>File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($lessons as $item)
                                    <tr data-entry-id="{{ $item->id }}">
                                        <td>{{ $item->id}}</td>
                                        <td>{{ $item->chapter }}</td>
                                        <td>{{ $item->lesson_name }}</td>
                                        <td>{{ $item->course . "-". $item->section }}</td>
                                        <td>

                                            <a class="btn btn-success btn-md"
                                                href="{{ asset('file/uploads/'.$item->file) }}" download>Download
                                                File</a>

                                        </td>
                                        <td>

                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('teacher.teacher_lessons.edit', $item->id) }}"
                                                    class="btn btn-info px-4">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <form onclick="return confirm('are you sure ? ')" class="d-inline"
                                                    action="{{ route('teacher.teacher_lessons.destroy', $item->id) }}"
                                                    method="POST">
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

                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
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
    url: "",
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
  $('.datatable-question:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>
@endpush
@section('script')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
        $(".alert").show("slow").delay(3000).hide("slow");
    } );
</script>
@endsection