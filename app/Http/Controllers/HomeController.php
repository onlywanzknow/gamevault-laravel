<?php

namespace App\Http\Controllers;

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

        return view('welcome', compact('popularGames', 'error'));
    }
}