<?php

namespace App\Http\Controllers;

use App\Services\RawgService;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request, RawgService $rawgService)
    {
        $search = trim($request->get('search', ''));

        $data = $rawgService->getGames($search !== '' ? $search : null);

        $games = $data['results'];
        $error = $data['error'];

        return view('games.index', compact('games', 'search', 'error'));
    }
}