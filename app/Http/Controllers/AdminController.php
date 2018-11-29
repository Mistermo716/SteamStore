<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class AdminController extends Controller
{
    public function index()
    {
        $games = ['Minecraft', 'NBA 2K19'];
        $adminName = auth()->user()->name;
        return view('admin', [
            'admin' => $adminName,
            'games' => $games
        ]);
        
    }
}
