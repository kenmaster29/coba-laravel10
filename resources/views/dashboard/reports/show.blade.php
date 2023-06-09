@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-5">
        <div class="col-lg-8 ">
            <h5>Detail {{ $report->category->name }}</h5>

            <a href="/dashboard/reports" class="text-decoration-none">
                <button type="button" class="btn btn-outline-success"><i class="bi bi bi-back"></i> Back</button>
            </a>
            <a href="/dashboard/reports/{{ $report->slug }}/edit"class="text-decoration-none">
                <button type="button" class="btn btn-outline-primary"><i class="bi bi bi-pencil-square"></i> Edit</button>
            </a>
            <form action="/dashboard/reports/{{ $report->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-outline-danger" onclick="return confirm('are you sure want to delete this?')"><i class="bi bi bi-trash3"></i> Delete</button>
            </form>
            <article class="mt-3 mb-4">
                {{ $report->date }}
                <h5>{{ $report->equipment }}</h5>
                <b>Problem:</b> {{ $report->problem }}
                <br><b>Action:</b> {!! $report->action !!}
                <br><b>Status:</b> {{ ($report->status === 1) ? 'done' : 'continue' }}
                <div class="mt-3">
                    @if($report->image)
                    <img src="{{ asset('storage/'.$report->image) }}" class="img-preview img-fluid mb-3 col-sm-5">
                    @else
                    <a href=""></a>
                    @endif
                </div>
            </article>
        </div>
    </div>
</div>

@endsection
