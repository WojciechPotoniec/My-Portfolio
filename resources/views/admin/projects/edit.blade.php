@extends('layouts.app')

@section('title', 'Edit Project: ' . $project->title)

@section('content')
<section>
    <div class="d-flex justify-content-between align-items-center py-4">
        <h2>Edit project: {{$project->title}}</h2>
        <a href="{{route('admin.projects.show', $project->slug)}}" class="btn btn-danger">Show project</a>
    </div>

    <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title', $project->title) }}" minlength="3" maxlength="200" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <div class="mb-3">Image preview:</div>
            <div class="media mb-3 me-4">
                @if($project->image)
                    <img class="shadow" width="150" src="{{asset('storage/' . $project->image)}}" alt="{{$project->title}}"
                        id="uploadPreview">
                @else
                    <img class="shadow" width="150" src="/images/placeholder.png" alt="{{$project->title}}"
                        id="uploadPreview">
                @endif
            </div>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content:</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"
                required>{{ old('content', $project->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
                <label for="type_id" class="form-label">Select type</label>
                <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                    <option value="">Select type</option>
                  @foreach ($types as $type)
                      <option value="{{$type->id}}" {{ $type->id == $project->type_id ? 'selected' : '' }}>{{$type->name}}</option>
                  @endforeach
                </select>
                @error('type_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
        <div class="form-group mb-3">
                <p>Select Technologies:</p>
                @foreach ($technologies as $technology)
                    <div>
                        <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" class="form-check-input"
                            {{ $project->technologies->contains($technology->id)  ? 'checked' : '' }}>
                        <label for="" class="form-check-label">{{ $technology->name }}</label>
                    </div>
                @endforeach
                @error('technologies')
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