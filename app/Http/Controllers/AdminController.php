<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGameRequest;
use App\Platform;
use App\Game;
use App\Genre;
use App\Charts\genrePie;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function games()
    {
        $games = Game::with('genre')->get();

        return view('admin.games', compact('games'));
    }

    public function reports()
    {
        $data = Game::groupBy('genre_id')
        ->get()
        ->map(function($item){
            return count($item);
        });
        $chart =  new genrePie();
        $chart
        ->title('My nice chart')
        ->labels($data->keys())
        ->dataset('dataset1', 'pie', $data->values())
        ->backgroundColor('blue', 'red', 'yellow');
        return view('admin.reports',compact('chart'));
    }

    public function create()
    {
        return $this->edit(new Game());
    }

    public function store(CreateGameRequest $request)
    {
        /** @var Game $game */
        $game = Game::updateOrCreate([
            'slug' => $request->get('slug'),
        ], $request->all());

        $game->platforms()->sync($request->get('platforms'));

        return redirect()->back();
    }

    public function edit(Game $game)
    {
        if ($game->exists) {
            $game->load('platforms');
        }

        $genres = Genre::all();
        $platforms = Platform::all();

        return view('admin.add', compact('genres', 'platforms', 'game'));
    }

    public function delete(Game $game)
    {
        $game->delete();

        return response(null, 204);
    }
}
