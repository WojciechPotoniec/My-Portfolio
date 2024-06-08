@extends('layouts.app')
@section('name', $type->name)

@section('content')
<section>
    <h1>{{$type->name}}</h1>
    <div class="d-flex justify-content-between align-items-center py-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Update At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($type->projects as $project)
                    <tr>
                        <td>{{$project->id}}</td>
                        <td>{{$project->name}}</td>
                        <td>{{$project->slug}}</td>
                        <td>{{$project->created_at}}</td>
                        <td>{{$project->updated_at}}</td>
                        <td>
                            <a href="{{route('admin.projects.show', $project->slug)}}" title="Show" class="text-black px-2"><i
                                    class="bi bi-eye"></i></a>
                            <a href="{{route('admin.projects.edit', $project->slug)}}" title="Edit" class="text-black px-2"><i
                                    class="bi bi-pencil-fill"></i></a>
                            <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button border-0 bg-transparent"
                                    data-item-title="{{ $project->name }}">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@include('partials.modal-delete')
@endsection