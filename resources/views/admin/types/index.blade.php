@extends('layouts.app')

@section('content')
<section>
  @if(session()->has('message'))
    <div class="alert alert-success">{{session()->get('message')}}</div>
  @endif
  <div class="d-flex justify-content-between align-items-center py-4">
    <h1>Types</h1>
    <a href="{{route('admin.types.create')}}" class="btn btn-danger">Create new type</a>
  </div>

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
      @foreach ($types as $type)
      <tr>
      <td>{{$type->id}}</td>
      <td>{{$type->name}}</td>
      <td>{{$type->slug}}</td>
      <td>{{$type->created_at}}</td>
      <td>{{$type->updated_at}}</td>
      <td>
        <a href="{{route('admin.types.show', $type->slug)}}" title="Show" class="text-black px-2"><i
          class="bi bi-eye"></i></i></a>
        <a href="{{route('admin.types.edit', $type->slug)}}" title="Edit" class="text-black px-2"><i
          class="bi bi-pencil-fill"></i></a>
        <form action="{{route('admin.types.destroy', $type->slug)}}" method="POST" class="d-inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-button border-0 bg-transparent" data-item-title="{{ $type->name }}">
          <i class="bi bi-trash3-fill"></i>
        </button>
        </form>
      </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</section>

@include('partials.modal-delete')
@endsection