@extends('layouts.main')

@section('content')
    <h1>
        Browsing
        @if (isset($search))
            <small class="text-muted">{{ $search }}</small>
        @endif
    </h1>
    <hr>

    @if (count($games) > 0)
        @each('components.game-result', $games, 'game')
       {{-- @component('components.result-section', ['title' => 'Games', 'class' => 'text-primary', 'data' => $games])
        @endcomponent

        @component('components.result-section', ['title' => 'Genres', 'class' => 'text-info', 'data' => $genres])
        @endcomponent

        @component('components.result-section', ['title' => 'Platforms', 'class' => 'text-success', 'data' => $platforms])
        @endcomponent--}}
    @else
        <strong class="text-warning">There were no results for that query.</strong>
    @endif
@endsection
