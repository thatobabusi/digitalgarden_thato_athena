@extends('system_layouts.backend.app_layout_backend_admin')

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.activity.index', \Str::title('Activity Logs')) }}
@endsection

@section('content')

    @yield('breadcrumbs')

    <div class="card">
        <div class="card-header">
            Activity Logs
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-ActivityLog"
                       name="datatable-ActivityLog"
                       id="datatable-ActivityLog">
                    <thead>
                        <tr>
                            <th width="10"></th>
                            <th>log_name</th>
                            <th>description</th>
                            <th>subject_id</th>
                            <th>subject_type</th>
                            <th>causer_id</th>
                            <th>causer_type</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@parent
    <script>
       $(function () {

           var table = $('#datatable-ActivityLog').DataTable({
               processing: false,
               serverSide: false,
               ajax: "{{route('admin.activity.getAllAcitivityLogsByAjax')}}",
               select: {
                   style:    'single',
                   selector: ':not(:first-child)'
               },
               lengthMenu: [
                   [5, 10, 25, 50, 100, 500, -1],
                   ['5 rows', '10 rows', '25 rows', '50 rows', '100 rows', '500 rows', 'Show all']
               ],
               columns: [
                   {data: 'id', name: 'DT_RowIndex',  visible: false},
                   {data: 'log_name', name: 'log_name'},
                   {data: 'description', name: 'description'},
                   {data: 'subject_id', name: 'subject_id'},
                   {data: 'subject_type', name: 'subject_type'},
                   {data: 'causer_id', name: 'causer_id'},
                   {data: 'causer_type', name: 'causer_type'},
                   /*{data: 'properties', name: 'properties'},*/
                   {data: 'created_at', name: 'created_at'},
                   {data: 'updated_at', name: 'updated_at'},
                   /*{data: 'action', name: 'action',
                       orderable: false,
                       searchable: false
                   },*/
               ]
           });

       });
    </script>
@endsection
