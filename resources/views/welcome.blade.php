@extends('layouts.main', ['fluid' => true])

@section('content')

    <div class="row">
        <div class="col-auto offset-1">
            <h6>Discover</h6>
            <nav class="nav flex-column">
                <a class="text-info" href="{{ route('store.recommended') }}">
                    <i class="fas fa-thumbs-up"></i>
                    Recommendations
                </a>

                <a class="text-info" href="{{ route('store.latest') }}">
                    <i class="fab fa-gripfire"></i>
                    New Releases
                </a>
            </nav>

            <h6 class="mt-3">Browse by Platform</h6>
            <nav class="nav flex-column">
                @foreach ($platforms as $platform)
                    <a class="text-info" href="{{ route('store.platform', $platform->slug) }}">
                        <i class="{{ $platform->icon }} fa-fw"></i>
                        {{ $platform->name }}
                    </a>
                @endforeach
            </nav>

            <h6 class="mt-3">Browse by Genre</h6>
            <nav class="nav flex-column">
                @foreach ($genres as $genre)
                    <a class="text-info" href="{{ route('store.genre', $genre->slug) }}">
                        {{ $genre->name }}
                    </a>
                @endforeach
            </nav>
        </div>
        <div class="col-auto">
            Put the game gallery layout here
        </div>
    </div>

@endsection
