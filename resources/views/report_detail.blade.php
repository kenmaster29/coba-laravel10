
@extends('layouts.main')

@section('container')

<div class="container">
    <h5>Detail <a class="text-decoration-none" href="/categories/{{ $report_posts->category->slug }}">{{ $report_posts->category->name }}</a></h5>

        <article class="mt-3 mb-4">
                {{ $report_posts->date }}
            <h5>{{ $report_posts->equipment }}</h5>
            <a class="text-decoration-none" href=""> {{ $report_posts->user->name }}</a>
            <br><b>Problem:</b> {{ $report_posts->problem }}
            <br><b>Action:</b> {!! $report_posts->action !!}
            <br><b>Status:</b> {{ ($report_posts->status === 1) ? 'done' : 'continue' }}
            <br><a href="/report">Back to report list</a>

            <div class="mt-3 mb-4">
                @if($report_posts->image)
                <img src="{{ asset('storage/'.$report_posts->image) }}" alt="" style="max-width: 100%">
                @else
                <a href=""></a>
                @endif
            </div>

        </article>


</div>

@endsection
