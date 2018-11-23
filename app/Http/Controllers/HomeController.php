<?php

namespace App\Http\Controllers;

use App\Game;
use App\Genre;
use App\Platform;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function search(Request $request)
    {
        $request->flash();
        $search = $request->get('q');

        $games = Game::where('name', 'like', '%'. $search .'%')->get();
        $genres = Genre::where('name', 'like', '%'. $search .'%')->get();
        $platforms = Platform::where('name', 'like', '%'. $search .'%')->get();

        $hasResults = $games->isNotEmpty() || $genres->isNotEmpty() || $platforms->isNotEmpty();

        return view('results', compact('search', 'games', 'genres', 'platforms', 'hasResults'));
    }
}
