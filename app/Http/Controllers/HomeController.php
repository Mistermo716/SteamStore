<?php

namespace App\Http\Controllers;

use App\Game;
use App\Genre;
use App\Platform;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function index()
    {
        $games = Game::inRandomOrder()->take(9);
        return view('welcome', [
            'games' => $games
        ]);
    }

    public function search(Request $request)
    {
        $sort = $request->get('sort', 'relevance');
        $request->merge(['sort' => $sort]);

        $request->flash();
        $search = $request->get('q') ?? '';

        /** @var $games LengthAwarePaginator $games */
        $query = Game::with('platforms')->search($search);

        $sortable = Game::sorts();
        if ($sort = $sortable->get($sort)) {
            $query->orderBy(array_get($sort, 'field'), array_get($sort, 'direction'));
        }

        $games = $query->paginate();
        $games->appends([
            'q' => $search,
            'sort' => $sort,
        ]);

        return view('results', compact('search', 'games', 'sortable'));
    }

    public function store()
    {
        $games = Game::with('platforms')
            ->orderBy('name')
            ->paginate();
        $sortable = Game::sorts();

        return view('results', compact('games', 'sortable'));
    }
}
