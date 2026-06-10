<?php

namespace App\Http\Controllers;

use App\Models\GameComment;
use App\Models\Wishlist;
use App\Services\RawgService;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request, RawgService $rawgService)
    {
        $genres = [
            '' => 'Semua Genre',
            'action' => 'Action',
            'adventure' => 'Adventure',
            'role-playing-games-rpg' => 'RPG',
            'shooter' => 'Shooter',
            'strategy' => 'Strategy',
            'sports' => 'Sports',
            'racing' => 'Racing',
            'simulation' => 'Simulation',
            'indie' => 'Indie',
            'puzzle' => 'Puzzle',
        ];

        $platforms = [
            '' => 'Semua Platform',
            '1' => 'PC',
            '2' => 'PlayStation',
            '3' => 'Xbox',
            '7' => 'Nintendo',
            '4' => 'iOS',
            '8' => 'Android',
        ];

        $orderings = [
            '-rating' => 'Rating Tertinggi',
            '-released' => 'Rilis Terbaru',
            'name' => 'Nama A-Z',
            '-metacritic' => 'Metacritic Tertinggi',
        ];

        $search = trim($request->get('search', ''));
        $selectedGenre = $request->get('genre', '');
        $selectedPlatform = $request->get('platform', '');
        $selectedOrdering = $request->get('ordering', '-rating');
        $currentPage = max(1, (int) $request->get('page', 1));

        if (!array_key_exists($selectedGenre, $genres)) {
            $selectedGenre = '';
        }

        if (!array_key_exists($selectedPlatform, $platforms)) {
            $selectedPlatform = '';
        }

        if (!array_key_exists($selectedOrdering, $orderings)) {
            $selectedOrdering = '-rating';
        }

        $data = $rawgService->getGames(
            $search !== '' ? $search : null,
            $selectedGenre !== '' ? $selectedGenre : null,
            $selectedPlatform !== '' ? $selectedPlatform : null,
            $selectedOrdering,
            $currentPage
        );

        $games = $data['results'];
        $count = $data['count'];
        $next = $data['next'];
        $previous = $data['previous'];
        $error = $data['error'];

        return view('games.index', compact(
            'games',
            'count',
            'next',
            'previous',
            'currentPage',
            'search',
            'error',
            'genres',
            'platforms',
            'orderings',
            'selectedGenre',
            'selectedPlatform',
            'selectedOrdering'
        ));
    }

    public function show(int|string $id, RawgService $rawgService)
    {
        $detailData = $rawgService->getGameDetail($id);
        $game = $detailData['game'];
        $error = $detailData['error'];

        $screenshots = [];
        $comments = collect();
        $isWishlisted = false;

        if ($game) {
            $screenshots = $rawgService->getGameScreenshots($id);

            $comments = GameComment::with('user')
                ->where('rawg_game_id', $game['id'])
                ->latest()
                ->get();

            if (auth()->check()) {
                $isWishlisted = Wishlist::where('user_id', auth()->id())
                    ->where('rawg_game_id', $game['id'])
                    ->exists();
            }
        }

        return view('games.show', compact(
            'game',
            'screenshots',
            'comments',
            'isWishlisted',
            'error'
        ));
    }
}