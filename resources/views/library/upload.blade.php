@extends('layouts.app')

@section('title', 'Upload Document')

@section('content')
<div class="container">
    <h1>Upload Document</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="document">Choose Document</label>
            <input type="file" name="document" id="document" class="form-control">
            @error('document')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
