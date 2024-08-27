<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    // Menampilkan form upload
    public function showUploadForm()
    {
        return view('library.upload');
    }

    // Menangani upload file
    public function upload(Request $request)
    {
        $request->validate([
            'document' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $path = $request->file('document')->store('documents', 'public');

        return redirect('/library')->with('success', 'File uploaded successfully!');
    }
}
