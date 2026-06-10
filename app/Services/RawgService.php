<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class RawgService
{
    private string $baseUrl = 'https://api.rawg.io/api';

    private int $cacheSeconds = 1800;

    public function hasApiKey(): bool
    {
        return !empty(env('RAWG_API_KEY'));
    }

    public function getGames(
        ?string $search = null,
        ?string $genre = null,
        ?string $parentPlatform = null,
        string $ordering = '-rating',
        int $page = 1
    ): array {
        if (!$this->hasApiKey()) {
            return [
                'results' => [],
                'count' => 0,
                'next' => null,
                'previous' => null,
                'error' => 'RAWG_API_KEY belum diisi di file .env.',
            ];
        }

        $page = max(1, $page);

        $params = [
            'key' => env('RAWG_API_KEY'),
            'page_size' => 12,
            'ordering' => $ordering,
            'page' => $page,
        ];

        if ($search) {
            $params['search'] = $search;
        }

        if ($genre) {
            $params['genres'] = $genre;
        }

        if ($parentPlatform) {
            $params['parent_platforms'] = $parentPlatform;
        }

        $cacheKey = 'rawg_games_' . md5(json_encode([
            'search' => $search,
            'genre' => $genre,
            'parent_platform' => $parentPlatform,
            'ordering' => $ordering,
            'page' => $page,
        ]));

        return Cache::remember($cacheKey, $this->cacheSeconds, function () use ($params) {
            try {
                $response = Http::acceptJson()
                    ->timeout(15)
                    ->get($this->baseUrl . '/games', $params);

                if (!$response->successful()) {
                    return [
                        'results' => [],
                        'count' => 0,
                        'next' => null,
                        'previous' => null,
                        'error' => 'Gagal mengambil data dari RAWG API. Status: ' . $response->status(),
                    ];
                }

                return [
                    'results' => $response->json('results') ?? [],
                    'count' => $response->json('count') ?? 0,
                    'next' => $response->json('next'),
                    'previous' => $response->json('previous'),
                    'error' => null,
                ];
            } catch (\Exception $e) {
                return [
                    'results' => [],
                    'count' => 0,
                    'next' => null,
                    'previous' => null,
                    'error' => 'Terjadi masalah koneksi ke RAWG API: ' . $e->getMessage(),
                ];
            }
        });
    }

    public function getRecommendedGamesByGenre(?string $genreSlug, int|string|null $currentGameId = null): array
    {
        if (!$this->hasApiKey() || !$genreSlug) {
            return [];
        }

        $cacheKey = 'rawg_recommendations_' . md5(json_encode([
            'genre' => $genreSlug,
            'current_game_id' => $currentGameId,
        ]));

        return Cache::remember($cacheKey, $this->cacheSeconds, function () use ($genreSlug, $currentGameId) {
            try {
                $response = Http::acceptJson()
                    ->timeout(15)
                    ->get($this->baseUrl . '/games', [
                        'key' => env('RAWG_API_KEY'),
                        'genres' => $genreSlug,
                        'ordering' => '-rating',
                        'page_size' => 8,
                    ]);

                if (!$response->successful()) {
                    return [];
                }

                return collect($response->json('results') ?? [])
                    ->filter(function ($game) use ($currentGameId) {
                        return (string) ($game['id'] ?? '') !== (string) $currentGameId;
                    })
                    ->take(6)
                    ->values()
                    ->toArray();
            } catch (\Exception $e) {
                return [];
            }
        });
    }

    public function getGameDetail(int|string $id): array
    {
        if (!$this->hasApiKey()) {
            return [
                'game' => null,
                'error' => 'RAWG_API_KEY belum diisi di file .env.',
            ];
        }

        $cacheKey = 'rawg_game_detail_' . $id;

        return Cache::remember($cacheKey, $this->cacheSeconds, function () use ($id) {
            try {
                $response = Http::acceptJson()
                    ->timeout(15)
                    ->get($this->baseUrl . '/games/' . $id, [
                        'key' => env('RAWG_API_KEY'),
                    ]);

                if (!$response->successful()) {
                    return [
                        'game' => null,
                        'error' => 'Gagal mengambil detail game dari RAWG API. Status: ' . $response->status(),
                    ];
                }

                return [
                    'game' => $response->json(),
                    'error' => null,
                ];
            } catch (\Exception $e) {
                return [
                    'game' => null,
                    'error' => 'Terjadi masalah koneksi ke RAWG API: ' . $e->getMessage(),
                ];
            }
        });
    }

    public function getGameScreenshots(int|string $id): array
    {
        if (!$this->hasApiKey()) {
            return [];
        }

        $cacheKey = 'rawg_game_screenshots_' . $id;

        return Cache::remember($cacheKey, $this->cacheSeconds, function () use ($id) {
            try {
                $response = Http::acceptJson()
                    ->timeout(15)
                    ->get($this->baseUrl . '/games/' . $id . '/screenshots', [
                        'key' => env('RAWG_API_KEY'),
                        'page_size' => 6,
                    ]);

                if (!$response->successful()) {
                    return [];
                }

                return $response->json('results') ?? [];
            } catch (\Exception $e) {
                return [];
            }
        });
    }
}