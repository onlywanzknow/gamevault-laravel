<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RawgService
{
    private string $baseUrl = 'https://api.rawg.io/api';

    public function hasApiKey(): bool
    {
        return !empty(env('RAWG_API_KEY'));
    }

    public function getGames(?string $search = null): array
    {
        if (!$this->hasApiKey()) {
            return [
                'results' => [],
                'error' => 'RAWG_API_KEY belum diisi di file .env.',
            ];
        }

        $params = [
            'key' => env('RAWG_API_KEY'),
            'page_size' => 12,
            'ordering' => '-rating',
        ];

        if ($search) {
            $params['search'] = $search;
        }

        try {
            $response = Http::acceptJson()
                ->timeout(15)
                ->get($this->baseUrl . '/games', $params);

            if (!$response->successful()) {
                return [
                    'results' => [],
                    'error' => 'Gagal mengambil data dari RAWG API. Status: ' . $response->status(),
                ];
            }

            return [
                'results' => $response->json('results') ?? [],
                'error' => null,
            ];
        } catch (\Exception $e) {
            return [
                'results' => [],
                'error' => 'Terjadi masalah koneksi ke RAWG API: ' . $e->getMessage(),
            ];
        }
    }
}