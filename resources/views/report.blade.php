
@extends('layouts.main')

@section('container')

    <h1>Electrical and Instrument Reports</h1>

    <div>
        @if ($report_posts->count())

        <table class="table table-sm table-hover">
            <thead>
                <tr class="table-warning">
                    <th scope="col" class="text-center">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">HAC</th>
                    <th scope="col">Problem</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($report_posts as $report_item)
                <tr>
                    <td class="text-center fw-normal"><a href="/report/{{ $report_item->slug }}" class="text-decoration-none text-black">{{ $loop->iteration }}</a></th>
                    <td style="width: 50px"><a href="/report/{{ $report_item->slug }}" class="text-decoration-none text-black">{{ $report_item->date }}</td>
                    <td class="fw-bold" style="width: 100px"><a href="/report/{{ $report_item->slug }}" class="text-decoration-none text-black">{{ $report_item->equipment }}</td>
                    <td><a href="/report/{{ $report_item->slug }}" class="text-decoration-none text-black">{{ $report_item->problem }}</td>
                    <td><a href="/report/{{ $report_item->slug }}" class="text-decoration-none text-black">{{ strip_tags($report_item->action) }}</td>
                </tr>
                @endforeach
            </tbody>

                    {{--
                    <article class="mt-3 mb-4">
                        {{ $report_item->date }}
                        <h5>{{ $report_item->equipment }}</h5>
                        <a class="text-decoration-none" href="/user/{{ $report_item->user->name }}"> {{ $report_item->user->name }}</a>
                        <br><b>Problem:</b> {{ $report_item->problem }}
                        <br><b>Action:</b> <a href="/report/{{ $report_item->slug }}">see detail...</a>
                        <br><b>Status:</b> {{ ($report_item->status === 1) ? 'done' : 'continue' }}
                    </article>
                    --}}







        </table>

        @else
            <p class=""text-center fs-4>No report found!</p>
        @endif

    </div>

    <div class="d-flex justify-content-end">
        {{ $report_posts->links() }}
    </div>


@endsection

