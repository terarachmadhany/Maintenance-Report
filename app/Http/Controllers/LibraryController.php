<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class LibraryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $documents = Document::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->get();

        return view('library.library', compact('documents'));
    }

    public function show($id)
    {
        $document = Document::findOrFail($id);
        return response()->json($document);
    }
}
