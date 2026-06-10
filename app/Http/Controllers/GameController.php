<?php

namespace App\Http\Controllers;

use App\Models\GameComment;
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

    public function show(int|string $id, RawgService $rawgService)
    {
        $detailData = $rawgService->getGameDetail($id);
        $game = $detailData['game'];
        $error = $detailData['error'];

        $screenshots = [];
        $comments = collect();

        if ($game) {
            $screenshots = $rawgService->getGameScreenshots($id);

            $comments = GameComment::with('user')
                ->where('rawg_game_id', $game['id'])
                ->latest()
                ->get();
        }

        return view('games.show', compact('game', 'screenshots', 'comments', 'error'));
    }
}