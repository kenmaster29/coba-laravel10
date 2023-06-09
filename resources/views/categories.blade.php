
@extends('layouts.main')

@section('container')

    <h5>{{ $title }}</h5>

    @foreach ($categories as $category_item)
        <ul>
            <li>
                <h6>
                    {{ $category_item->slug }} <a href="/categories/{{ $category_item->slug }}">{{ $category_item->name }}</a>
                </h6>
            </li>
        </ul>
    @endforeach

@endsection

