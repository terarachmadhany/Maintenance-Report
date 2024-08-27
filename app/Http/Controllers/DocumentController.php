<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'document' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('document');
        $path = $file->store('documents', 'documents');

        return redirect()->back()->with('success', 'Document uploaded successfully!');
    }
}
