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
        <div class="card mb-3 bg-secondary">
            <div class="card-body p-2">
                <form id="search-form" action="{{ route('search') }}" class="form-inline">
                    @if (isset($search))
                        <div class="input-group input-group-sm col-10 pl-0">
                            <input class="form-control py-2 border border-right-0" type="search" name="q" placeholder="Enter a search term..." value="{{ old('q') }}" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary border border-left-0 {{ old('q') ? '' : ' d-none' }}" type="button" id="clearSearch">
                                    <i class="fa fa-times"></i>
                                </button>
                                <button class="btn btn-primary border" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    @endif

                    @if (isset($sortable))
                        <select id="search-sort" name="sort" class="form-control form-control-sm col-2 ml-auto">
                            <option></option>
                            @foreach ($sortable as $key => $sort)
                                <option value="{{ $key }}"{{ isset($search) ? (old('sort') === $key ? ' selected' : '') : '' }}>{{ $sort['display'] }}</option>
                            @endforeach
                        </select>
                    @endif
                </form>
            </div>
        </div>

        @each('components.game-result', $games, 'game')

        {{ $games->links() }}
        {{--<nav>
            <ul class="pagination justify-content-end">
                <li class="page-item">
                    <a class="page-link" href="#" tabindex="-1">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>--}}
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


@section('scripts')
    <script>
        var $search = $('input[name="q"]');
        var $clear = $('#clearSearch');
        var $form = $('#search-form');

        $('#search-sort').on('input', function() {
            $form.submit();
        });

        $search.on('input', function() {
            if ($(this).val().length > 0) {
                $clear.removeClass('d-none');
            } else {
                $clear.addClass('d-none');
            }
        });

        $clear.on('click', function() {
            $search.val('');
            $clear.addClass('d-none');
        });
    </script>
@endsection
