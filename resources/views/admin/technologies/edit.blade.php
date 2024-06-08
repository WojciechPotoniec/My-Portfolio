@extends('layouts.app')

@section('title', 'Edit type: ' . $type->name)

@section('content')
<section>
    <div class="d-flex justify-content-between align-items-center py-4">
        <h2>Edit type: {{$type->name}}</h2>
        <a href="{{route('admin.types.show', $type->slug)}}" class="btn btn-danger">Show type</a>
    </div>

    <form action="{{ route('admin.types.update', $type->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Titolo:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $type->name) }}" minlength="3" maxlength="200" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-danger">Save</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </form>
</section>
@include('partials.editor')
@endsection