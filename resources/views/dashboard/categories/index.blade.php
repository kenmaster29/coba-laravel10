@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 mb-2 border-bottom">
    <h5 class="h5">Report Categories</h5>
</div>

@if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

<div class="table-responsive">
    <a href="/dashboard/categories/create" class="btn btn-success mb-3">Add New Category</a>

    <table class="table table-sm table-hover">
    <caption>Total: {{ $categories->count() }} categories</caption>
      <thead>
        <tr class="table-warning">
          <th scope="col" class="text-center">#</th>
          <th scope="col">Category Code</th>
          <th scope="col">Category Name</th>
          <th scope="col">Edit</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
          <td class="text-center">{{ $loop->iteration }}</th>
          <td class="col">{{ $category->slug }}</td>
          <td class="col">{{ $category->name }}</td>
          <td class="col-1 text-sm-center text-md-center align-middle">
                <form action="/dashboard/categories/{{ $category->slug }}/edit" method="get" class="d-inline">
                    <button class="border-0 bg-transparent"><i class="bi bi-pencil-square text-primary"></i></button>
                </form>
                <form action="/dashboard/categories/{{ $category->name }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                <button class="border-0 bg-transparent" onclick="return confirm('are you sure want to delete this?')"><i class="bi bi-x-square-fill text-danger"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>

@endsection
