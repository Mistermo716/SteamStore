<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Genre;

class AdminController extends Controller
{
    public function index()
    {
        $games = Game::all();
        $adminName = auth()->user()->name;
        return view('admin', [
            'admin' => $adminName,
            'games' => $games
        ]);
        
    }

    public function addGame(){

        $genres = Genre::all();
        return view('addGame', [
            'genres' => $genres
        ]);
    }

    public function storeGame(){
        $game = new Game();

        $game->name = request('name');
        $game->description = request('description');
        $game->score = request('score');
        $game->votes = request('votes');
        $game->publisher = request('publisher');
        $game->genre_id = request('genre_id');
        $game->image_url = request('image_url');
        $game->price = request('price');
        
        $game->save();
        return redirect('/admin');
    }

}
