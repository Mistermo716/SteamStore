<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

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
}
