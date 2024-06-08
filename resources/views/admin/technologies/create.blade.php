@extends('layouts.app')

@section('title', 'Create Type')

@section('content')
<section>
    <h2>Create a new type</h2>
    <form action="{{ route('admin.types.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}" minlength="3" maxlength="200" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div id="nameHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 200</div>
        </div>
        
        
        <div class="mb-3">
            <button type="submit" class="btn btn-danger">Create</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </form>
</section>
@include('partials.editor')
@endsection