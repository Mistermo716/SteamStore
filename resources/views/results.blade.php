@extends('layouts.main')

@section('content')
    <h1>
        Results for <small>{{ $search }}</small>
    </h1>
    <hr>

    @if ($hasResults)
        @component('components.result-section', ['title' => 'Games', 'class' => 'text-primary', 'data' => $games])
        @endcomponent

        @component('components.result-section', ['title' => 'Genres', 'class' => 'text-info', 'data' => $genres])
        @endcomponent

        @component('components.result-section', ['title' => 'Platforms', 'class' => 'text-success', 'data' => $platforms])
        @endcomponent
    @else
        <strong class="text-danger">There were no results for that query.</strong>
    @endif
@endsection
