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
<nav class="navbar navbar-light navbar-expand-lg bg-dark mb-3">
    <div class="container">
        <a class="navbar-brand" href="{{ url('') }}">
            @include('components.logo')
        </a>


        <a href="#" class="btn btn-success">
            <i class="fas fa-shopping-cart"></i>
            <span class="badge badge-light">4</span>
        </a>

        <ul class="navbar-nav mt-2 mt-lg-0 text-uppercase">
            <li class="nav-item">
                <a class="nav-link" href="#">Store</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Community</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Support</a>
            </li>
        </ul>

        <form action="{{ route('search') }}" class="form-inline my-2 my-lg-0 ml-3 w-50">
            <div class="input-group input-group-sm w-100">
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
