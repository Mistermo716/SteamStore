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
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="..." alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="..." alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="..." alt="Third slide">
                  </div>
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
        </div>
    </div>

@endsection
