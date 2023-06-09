@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 mb-2 border-bottom">
    <h5 class="h5">{{ auth()->user()->name }} Reports</h5>
</div>

@if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

<div class="table-responsive">
    <a href="/dashboard/reports/create" class="btn btn-success mb-3">Add Report</a>

    <table class="table table-sm table-hover">
    <caption>Total: {{ $reports->count() }} report(s)</caption>
      <thead>
        <tr class="table-warning">
          <th scope="col" class="text-center">#</th>
          <th scope="col">Date</th>
          <th scope="col" class="col-1">HAC</th>
          <th scope="col">Problem</th>
          <th scope="col">Action</th>
          <th scope="col" {{-- class="text-sm-center text-md-center d-none d-lg-block" --}}></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($reports as $r_item)
        <tr>
          <td class="align-middle"><a href="/dashboard/reports/{{ $r_item->slug }}"><button type="button" class="btn {{ ($r_item->status === 1) ? '' : 'btn-outline-danger' }} btn-lg">{{ $loop->iteration }}</button></a></th>
          <td class="col align-middle"><a href="/dashboard/reports/{{ $r_item->slug }}" class="text-decoration-none text-black">{{ $r_item->date }}</a></td>
          <td class="align-middle"><a href="/dashboard/reports/{{ $r_item->slug }}" class="text-decoration-none text-black">{{ $r_item->equipment }}</a></td>
          <td class="align-middle"><a href="/dashboard/reports/{{ $r_item->slug }}" class="text-decoration-none text-black">{{ $r_item->problem }}</a></td>
          <td class="align-middle"><a href="/dashboard/reports/{{ $r_item->slug }}" class="text-decoration-none text-black">{{ strip_tags($r_item->action) }}</a></td>
          <td class="col-1 text-sm-center text-md-center align-middle">
                <form action="/dashboard/reports/{{ $r_item->slug }}/edit" method="get" class="d-inline">
                    <button class="border-0 bg-transparent"><i class="bi bi-pencil-square text-primary"></i></button>
                </form>
                <form action="/dashboard/reports/{{ $r_item->slug }}" method="post" class="d-inline">
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
