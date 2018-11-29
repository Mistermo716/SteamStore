@extends('layouts.main')

@section('content')
    <h1 class="text-center">
        Hello {{$admin}}
    </h1>
    <ul>
        @foreach($games as $game)
            <li>{{$game->name}}</li>
        @endforeach
    </ul>
@endsection