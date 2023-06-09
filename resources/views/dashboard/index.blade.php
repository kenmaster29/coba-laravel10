@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/dashboard/reports/create" class="btn btn-success mb-3">Create New Report</a>
        {{-- <h5>Welcome back, {{ auth()->user()->name }}</h5> --}}
    </div>



    <div>
        <h6>All Pending List Report ({{ $reports->count() }}) </h6>
        <table class="table table-sm table-hover">
            <thead>
                <tr class="table-warning">
                    <th scope="col" class="text-center">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">HAC</th>
                    <th scope="col">Problem</th>
                    <th scope="col">Action</th>
                    <th scope="col" class="text-center">Edit</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>

@endsection
