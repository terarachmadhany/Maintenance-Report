<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskListController extends Controller
{
    // Fungsi untuk menampilkan daftar tugas
    public function index(Request $request)
    {
        // Ambil parameter filter dari request
        $priority = $request->input('priority');

        // Contoh pengambilan data dari database dengan filtering
        // $tasks = Task::query();
        // if ($priority) {
        //     $tasks->where('priority', $priority);
        // }
        // $tasks = $tasks->get();

        // Return view dengan data tugas yang sudah difilter
        return view('task-list', [
            // 'tasks' => $tasks,
        ]);
    }

    // Fungsi untuk menyimpan data dari Task List Form
    public function store(Request $request)
    {
        // Contoh penyimpanan data ke database
        // Task::create([
        //     'estimated_time' => $request->input('estimated_time'),
        //     'duration' => $request->input('duration'),
        //     'list_task' => $request->input('list_task')
        //     'cost' => $request->input('cost'),
        //     'date_needed' => $request->input('date_needed'),
        //     'approval_requester' => $request->input('approval_requester'),
        //     'approval_manager' => $request->input('approval_manager'),
        //     'approval_date' => $request->input('approval_date'),
        // ]);

        // Mengarahkan kembali ke form dengan pesan sukses
        return redirect('/task-list')->with('success', 'Task submitted successfully!');
    }
}
