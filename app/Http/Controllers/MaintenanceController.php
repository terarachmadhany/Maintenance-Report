<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MaintenanceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Maintenance::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('maintenance.show', $row->id).'" class="btn btn-info">Detail</a>';
                    $btn .= ' <a href="'.route('maintenance.reportPDF', $row->id).'" class="btn btn-danger">Laporan PDF</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('library.library');
    }

    public function show($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        return view('maintenance.show', compact('maintenance'));
    }

    public function reportPDF($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $pdf = Pdf::loadView('maintenance.pdf', compact('maintenance'));
        return $pdf->download('maintenance_report_'.$id.'.pdf');
    }
    public function createChangeRequest()
    {
        return view('maintenance.create_change_request');
    }

    public function storeChangeRequest(Request $request)
    {
        $validatedData = $request->validate([
            'project_name' => 'required|string|max:255',
            'change_name' => 'required|string|max:255',
            'project_description' => 'required|string',
            'ticket_number' => 'required|string|max:255',
            'requested_by' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        // Check if the change request ID already exists in the session
        $changeRequestId = session('change_request_id');

        if (!$changeRequestId) {
            // Create a new Maintenance record and store the ID in the session
            $maintenance = Maintenance::create($validatedData);
            session(['change_request_id' => $maintenance->id]);
            $changeRequestId = $maintenance->id;
        } else {
            // Find existing Maintenance record
            $maintenance = Maintenance::find($changeRequestId);

            if (!$maintenance) {
                // If the record doesn't exist, create a new one
                $maintenance = Maintenance::create($validatedData);
                session(['change_request_id' => $maintenance->id]);
            } else {
                // Update existing Maintenance record with new data
                $maintenance->update($validatedData);
            }
        }

        return redirect()->route('maintenance.createTaskDescription')->with('success', 'Change request created/updated successfully.');
    }


    public function createTaskDescription()
    {
        return view('maintenance.create_task_description');
    }

    public function storeTaskDescription(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'reason' => 'required|string|max:255',
            'priority' => 'required|string|in:High,Medium,Low',
            'technician' => 'required|string|max:255',
        ]);

        // Retrieve the change request ID from the session
        $changeRequestId = session('change_request_id');

        if ($changeRequestId) {
            $validatedData['change_request_id'] = $changeRequestId;
            Maintenance::find($changeRequestId)->update($validatedData);
        } else {
            return redirect()->route('maintenance.library')->with('error', 'Change request ID not found in session.');
        }

        return redirect()->route('maintenance.createTaskList')->with('success', 'Task description created/updated successfully.');
    }

    public function createTaskList()
    {
        return view('maintenance.create_task_list');
    }

    public function storeTaskList(Request $request)
    {
        $validatedData = $request->validate([
            'estimated_start' => 'required|date',
            'estimated_finish' => 'required|date',
            'duration' => 'required|string|in:1 hour,2 hours,Half Day,Full Day',
            'cost' => 'required|string',
            'list_task' => 'required|string',
            'date_needed' => 'required|date',
            'approval_requester' => 'required|string|max:255',
            'approval_manager' => 'required|string|max:255',
            'approval_date' => 'required|date',
            'last_interactor' => 'required|string|max:255',
        ]);

        // Retrieve the change request ID from the session
        $changeRequestId = session('change_request_id');

        if ($changeRequestId) {
            $validatedData['change_request_id'] = $changeRequestId;
            Maintenance::find($changeRequestId)->update($validatedData);
        } else {
            return redirect()->route('maintenance.index')->with('error', 'Change request ID not found in session.');
        }

        return redirect()->route('maintenance.library')->with('success', 'Task list created/updated successfully.');
    }
}
