@extends('layouts.main')

@section('content')
    <h4>{{ $game->name }}</h4>
    <div class="row">
        <div class="col-8">

        </div>
        <div class="col-4">
            <div class="game-image">
                <img class="img-fluid" src="{{ $game->image_url }}">
            </div>

            <div class="game-description">
                <small>{{ $game->description }}</small>
            </div>

            <div class="game-info mt-3">
                <table>
                    <tr>
                        <td class="w-50 text-muted">All Reviews</td>
                        <td>{{ $game->votes }}</td>
                    </tr>
                    <tr>
                        <td class="w-50 text-muted">Release Date</td>
                        <td>{{ $game->created_at->toFormattedDateString() }}</td>
                    </tr>
                    <tr>
                        <td class="w-50 text-muted">Publisher</td>
                        <td>{{ $game->publisher }}</td>
                    </tr>
                </table>

            </div>

            <div class="game-genre mt-2">
                <div class="text-muted mb-1">Popular categories for this item</div>
                <div class="badge badge-primary">
                    <span class="h6">{{ $game->genre->name }}</span>
                </div>
            </div>

            <div class="game-platforms mt-3">
                @foreach ($game->platforms as $platform)
                    <i class="fa-lg {{ $platform->icon }} mr-2"></i>
                @endforeach
            </div>
        </div>
    </div>
@endsection
