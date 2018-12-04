@extends('layouts.main')

@section('content')
    <h3 class="text-center">
        Hello {{ auth()->user()->name }}
    </h3>
    <a class="btn btn-success w-100" href="{{ route('admin.add') }}">Add Game</a>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Score</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            @foreach($games as $game)
                <tr id="game-{{ $game->id }}">
                    <td>{{ $game->id }}</td>
                    <td>{{ $game->name }}</td>
                    <td>{{ $game->publisher }}</td>
                    <td>{{ $game->genre->name }}</td>
                    <td>{{ $game->score }}</td>
                    <td>{{ currency($game->price) }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $game->slug) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(@json($game))">
                            <i class="fa fa-trash"></i>
                        </button>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        function confirmDelete(game) {
            if (! confirm("Are you sure you want to delete this product?"))
                return;

            $.post('{{ route('admin.delete', '') }}/' + id, function(data) {
                alert('deleted');
                console.log(data);
            });
        }
    </script>
@endsection
