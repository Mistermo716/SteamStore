<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-0">
    <div class="container">
        <div class="ml-auto">
            <a href="#" class="btn btn-sm btn-success rounded-top-0">Install Steam</a>

            @auth
                <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-light">Log Out</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-sm btn-dark">Login</a>
            @endauth
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom mb-3">
    <div class="container">
        <a class="navbar-brand" href="{{ url('') }}">
            @include('components.logo')
        </a>

        <ul class="navbar-nav mt-2 mt-lg-0">
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

        <form action="{{ route('search') }}" class="form-inline my-2 my-lg-0 ml-3 w-50">
            <div class="input-group w-100">
                <input class="form-control py-2 border-right-0 border bg-light" type="search" name="q" placeholder="Enter a search term..." value="{{ old('q') }}" required>
                <div class="input-group-append">
                    <button class="btn btn-light border-left-0 border{{ old('q') ? '' : ' d-none' }}" type="button" id="clearSearch">
                        <i class="fa fa-times"></i>
                    </button>
                    <button class="btn btn-dark border" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
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
