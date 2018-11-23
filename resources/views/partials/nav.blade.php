<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom mb-3">
    <a class="navbar-brand" href="{{ url('') }}">{{ config('app.name') }}</a>

    <form action="{{ route('search') }}" class="form-inline my-2 my-lg-0 mr-3 w-100">
        <div class="input-group w-100">
            <input class="form-control py-2 border-right-0 border" type="search" name="q" placeholder="Enter a search term..." value="{{ old('q') }}" required>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary border-left-0 border{{ old('q') ? '' : ' d-none' }}" type="button" id="clearSearch">
                    <i class="fa fa-times"></i>
                </button>
                <button class="btn btn-outline-secondary border" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
        </li>
    </ul>
    @auth
        <a href="{{ route('logout') }}" class="btn btn-outline-primary">Log Out</a>
    @endauth
</nav>

@section('scripts')
    <script>
        var $search = $('input[name="q"]');
        var $clear = $('#clearSearch');

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
