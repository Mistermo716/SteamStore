<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGameRequest;
use App\Platform;
use App\Game;
use App\Genre;
use App\Charts\genrePie;
use \Request;

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
        $gameCount = Game::count();
        $gamePrice = Game::avg('price');
        $genreCount = Genre::count();
       
        return view('admin.reports', compact('gameCount', 'gamePrice', 'genreCount'));
    }
    public function ajaxReports(){
        $genres = Genre::all();

        return $genres;
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
