
@extends('layouts.main')

@section('container')

    <h1>{{ $category }} List</h1>

    @if ($reports->count())

    @foreach ($reports as $report_item)
        <article class="mt-3 mb-4">
            {{ $report_item->date }}
            <h5>{{ $report_item->equipment }}</h5>
                {{ $report_item->user->name }}
            <br><b>Problem:</b> {{ $report_item->problem }}
            <br><b>Action:</b> <a href="/report/{{ $report_item->slug }}">see detail...</a>
            <br><b>Status:</b> {{ ($report_item->status === 1) ? 'done' : 'continue' }}
        </article>
    @endforeach


    @else
    <p class=""text-center fs-4>No report found!</p>
    @endif

    {{--
    <div class="d-flex justify-content-end">
        {{ $reports->links() }}
    </div>
    --}}
@endsection

