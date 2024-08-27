<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pemeliharaan</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Laporan Pemeliharaan</h1>
    <table>
        <tr>
            <th>ID</th>
            <td>{{ $maintenance->id }}</td>
        </tr>
        <tr>
            <th>Project Name</th>
            <td>{{ $maintenance->project_name }}</td>
        </tr>
        <tr>
            <th>Changed Name</th>
            <td>{{ $maintenance->change_name }}</td>
        </tr>
        <tr>
            <th>Ticket Number</th>
            <td>{{ $maintenance->ticket_number }}</td>
        </tr>
        <tr>
            <th>Requested By</th>
            <td>{{ $maintenance->requested_by }}</td>
        </tr>
        <tr>
            <th>Contact</th>
            <td>{{ $maintenance->contact }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $maintenance->date }}</td>
        </tr>
        <tr>
            <th>Reason</th>
            <td>{{ $maintenance->reason }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $maintenance->description }}</td>
        </tr>
        <tr>
            <th>Priority</th>
            <td>{{ $maintenance->priority }}</td>
        </tr>
        <tr>
            <th>Technician</th>
            <td>{{ $maintenance->technician }}</td>
        </tr>
        <tr>
            <th>Estimated Start</th>
            <td>{{ $maintenance->estimated_start }}</td>
        </tr>
        <tr>
            <th>Estimated Finish</th>
            <td>{{ $maintenance->estimated_finish }}</td>
        </tr>
        <tr>
            <th>Duration</th>
            <td>{{ $maintenance->duration }}</td>
        </tr>
        <tr>
            <th>Cost</th>
            <td>{{ $maintenance->cost }}</td>
        </tr>
        <tr>
            <th>Date Needed</th>
            <td>{{ $maintenance->date_needed }}</td>
        </tr>
        <tr>
            <th>Approval of Requester</th>
            <td>{{ $maintenance->approval_requester }}</td>
        </tr>
        <tr>
            <th>Approval of Manager</th>
            <td>{{ $maintenance->approval_manager }}</td>
        </tr>
        <tr>
            <th>Approval date</th>
            <td>{{ $maintenance->approval_date }}</td>
        </tr>
        <tr>
            <th>Last Interactor</th>
            <td>{{ $maintenance->last_interactor }}</td>
        </tr>
        <!-- Tambahkan field lain sesuai kebutuhan -->
    </table>
</body>

</html>
