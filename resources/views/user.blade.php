
@extends('layouts.main')

@section('container')

    <h1>{{ $title }}</h1>

    @if ($report_posts->count())

    @foreach ($report_posts as $report_item)
        <article class="mt-3 mb-4">
            {{ $report_item->date }}
            <h5>{{ $report_item->equipment }}</h5>
            <b>Problem:</b> {{ $report_item->problem }}
            <br><b>Action:</b> <a href="/report/{{ $report_item->slug }}">see detail...</a>
            <br><b>Status:</b> {{ ($report_item->status === 1) ? 'done' : 'continue' }}
        </article>
    @endforeach

    @else
    <p class=""text-center fs-4>No report found!</p>
    @endif

{{--
<div class="d-flex justify-content-end">
    {{ $report_item->links() }}
</div>
--}}

@endsection

