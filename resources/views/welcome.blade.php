@extends('layouts.main', ['fluid' => true])

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">

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
                <div style="width:50%; height: auto; margin:auto" id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($games as $game)
                                @if($loop->index == 0)
                                <li data-target="#carouselExampleIndicators" data-slide-to={{$loop->index}} class="active"></li>
                                @else 
                                <li data-target="#carouselExampleIndicators" data-slide-to={{$loop->index}}></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($games as $game)
                            @if($loop->index == 0)
                          <div class="carousel-item active">
                            <img class="d-block w-100" src={{$game->image_url}}>
                          <p>${{$game->price}}</p>
                          </div>
                          @else 
                          <div class="carousel-item">
                                <img class="d-block w-100" src={{$game->image_url}}>
                                <p>${{$game->price}}</p>
                              </div>
                          @endif
                          @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
@endsection
