<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangeRequestController extends Controller
{
    // Fungsi untuk menyimpan data dari Change Request Form
    public function store(Request $request)
    {
        // Memeriksa apakah ada file yang diupload
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Memindahkan file ke direktori publik
            $file->move(public_path('uploads'), $filename);
        }

        // Contoh penyimpanan data ke database
        // ChangeRequest::create([
        //     'project_name' => $request->input('project_name'),
        //     'project_description' => $request->input('project_description'),
        //     'ticket_number' => $request->input('ticket_number'),
        //     'request_by' => $request->input('request_by'),
        //     'contact' => $request->input('contact'),
        //     'date_time' => $request->input('date_time'),
        //     'document' => $filename ?? null,
        // ]);

        // Mengarahkan kembali ke form dengan pesan sukses
        return redirect('/change-request')->with('success', 'Change request submitted successfully!');
    }
}
