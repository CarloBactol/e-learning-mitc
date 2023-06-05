@extends('layouts.teacher')

@section('content')


<div class="container-fluid">

    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-10">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div
                            class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                            <h6 class="text-white text-capitalize ps-3">Student Exam Results</h6>

                        </div>
                    </div>
                    <div class="card-body px-0 pb-2" style="margin: 0 30px;">
                        <div class="table-responsive my-2">
                            <table class="table align-items-center  mb-0" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>User</th>
                                        <th>Points</th>
                                        <th>Questions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($results as $result)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $result->user->name }}</td>
                                        <td>{{ $result->total_points }}</td>
                                        <td>
                                            @foreach($result->questions as $key => $question)
                                            <span class="badge badge-pill badge-primary text-white bg-dark"> {{
                                                $question->question_text
                                                }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('teacher.teacher_results.show', $result->id) }}"
                                                    class="btn btn-success px-4">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                {{-- <a href="{{ route('teacher_results.results.edit', $result->id) }}"
                                                    class="btn btn-info">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a> --}}
                                                <form onclick="return confirm('are you sure ? ')" class="d-inline"
                                                    action="{{ route('teacher.teacher_results.destroy', $result->id) }}"
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

                                        {{-- <td>{{ $item->id }}</td>
                                        <td>{{ $item->department_name }}</td>
                                        <td>{{ $item->person_incharge }}</td>
                                        <td class="{{ $item->status == '1' ? 'text-success' : 'text-danger' }}">{{
                                            $item->status == '1' ? 'Active' : 'Disabled' }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-info float-start"
                                                href="{{ route('teacher.departments.edit', $item->id) }}"><i
                                                    class="fa fa-edit"></i></a>
                                            <form method="post"
                                                action="{{ route('teacher.departments.destroy', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm float-start"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </td> --}}
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

</div>
@endsection

@push('script-alt')
{{-- <script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  let deleteButtonTrans = 'delete selected'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.results.mass_destroy') }}",
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
  $('.datatable-result:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script> --}}


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