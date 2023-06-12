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
<div class="container">

    <div class="row">
        <div class="col-md-10" style="margin: 0 auto">
            <div class="card">
                <div class="card-header py-3 d-flex">


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="myTable" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Assignment Name</th>
                                    <th>Class</th>
                                    <th>Student</th>
                                    <th>Answer</th>
                                    <th>Date Submitted</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($assignment as $item)
                                <tr data-entry-id="{{ $item->id }}">
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        {{ $item->assignment_name }}
                                    </td>
                                    <td>
                                        {{ $item->class }}
                                    </td>
                                    <td>{{ $item->student }}</td>
                                    <td><a href="{{ $item->answer }}">{{ $item->answer }}</a></td>
                                    <td>{{ $item->created_at->diffForHumans() }}</td>
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
  $('.datatable-category:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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