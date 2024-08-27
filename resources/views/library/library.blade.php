@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Pemeliharaan</h1>
        <table id="maintenanceTable" class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project Name</th>
                    <th>Change Name</th>
                    <th>Ticket Number</th>
                    <th>Requested By</th>
                    <th>Contact</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Reason</th>
                    <th>Priority</th>
                    <th>Technician</th>
                    <th>List Task</th>
                    <th>Estimated Start</th>
                    <th>Estimated Finish</th>
                    <th>Duration</th>
                    <th>Cost</th>
                    <th>Date Needed</th>
                    <th>Approval of Requester</th>
                    <th>Approval of Manager</th>
                    <th>Approval Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('maintenance.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'project_name',
                        name: 'project_name'
                    },
                    {
                        data: 'change_name',
                        name: 'change_name'
                    },
                    {
                        data: 'ticket_number',
                        name: 'ticket_number'
                    },
                    {
                        data: 'requested_by',
                        name: 'requested_by'
                    },
                    {
                        data: 'contact',
                        name: 'contact'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'priority',
                        name: 'priority'
                    },
                    {
                        data: 'technician',
                        name: 'technician'
                    },
                    {
                        data: 'list_task',
                        name: 'list_task'
                    },
                    {
                        data: 'estimated_start',
                        name: 'estimated_start'
                    },
                    {
                        data: 'estimated_finish',
                        name: 'estimated_finish'
                    },
                    {
                        data: 'duration',
                        name: 'duration'
                    },
                    {
                        data: 'date_needed',
                        name: 'date_needed'
                    },
                    {
                        data: 'approval_requester',
                        name: 'approval_requester'
                    },
                    {
                        data: 'approval_manager',
                        name: 'approval_manager'
                    },
                    {
                        data: 'approval_date',
                        name: 'approval_date'
                    },
                    {
                        data: 'last_interactor',
                        name: 'last_interactor'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                    },
                ]
            });
        });
    </script>
@endsection
