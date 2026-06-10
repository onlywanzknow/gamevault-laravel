<?php

namespace App\Http\Controllers;

use App\Models\GameComment;
use App\Models\User;
use App\Models\Wishlist;
use App\Services\RawgService;

class HomeController extends Controller
{
    public function index(RawgService $rawgService)
    {
        $data = $rawgService->getGames();

        $popularGames = collect($data['results'] ?? [])
            ->take(6)
            ->values();

        $error = $data['error'] ?? null;

        $userCount = User::count();
        $wishlistCount = Wishlist::count();
        $commentCount = GameComment::count();

        $recentComments = GameComment::with('user')
            ->latest()
            ->take(4)
            ->get();

        return view('welcome', compact(
            'popularGames',
            'error',
            'userCount',
            'wishlistCount',
            'commentCount',
            'recentComments'
        ));
    }
}