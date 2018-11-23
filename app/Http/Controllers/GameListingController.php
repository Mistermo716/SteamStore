<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GameListingController extends Controller
{
    public function list(Request $request)
    {
        $games = Game::query();

        if ($platforms = $request->get('platforms')) {
            $games->whereHas('platforms', function ($q) use ($platforms) {
                $q->where('id', explode(',', $platforms));
            });
        }

        return $games->get();
    }

    public function view(Request $request, Game $game)
    {
        return $game;
    }
}