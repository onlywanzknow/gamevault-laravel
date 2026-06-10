<?php

namespace App\Http\Controllers;

use App\Models\GameComment;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) ($request->query('search') ?? ''));
        $selectedScope = (string) ($request->query('scope') ?? 'all');
        $selectedSort = (string) ($request->query('sort') ?? 'latest');

        $scopeOptions = [
            'all' => 'Semua Komentar',
            'mine' => 'Komentar Saya',
        ];

        $sortOptions = [
            'latest' => 'Komentar Terbaru',
            'oldest' => 'Komentar Terlama',
            'game_asc' => 'Nama Game A-Z',
            'game_desc' => 'Nama Game Z-A',
        ];

        if (!array_key_exists($selectedScope, $scopeOptions)) {
            $selectedScope = 'all';
        }

        if (!array_key_exists($selectedSort, $sortOptions)) {
            $selectedSort = 'latest';
        }

        $commentsQuery = GameComment::with('user');

        if ($selectedScope === 'mine') {
            $commentsQuery->where('user_id', auth()->id());
        }

        if ($search !== '') {
            $commentsQuery->where(function ($query) use ($search) {
                $query->where('game_name', 'like', '%' . $search . '%')
                    ->orWhere('comment', 'like', '%' . $search . '%');
            });
        }

        if ($selectedSort === 'oldest') {
            $commentsQuery
                ->orderBy('created_at', 'asc')
                ->orderBy('id', 'asc');
        } elseif ($selectedSort === 'game_asc') {
            $commentsQuery
                ->orderByRaw('LOWER(game_name) ASC')
                ->orderBy('created_at', 'desc');
        } elseif ($selectedSort === 'game_desc') {
            $commentsQuery
                ->orderByRaw('LOWER(game_name) DESC')
                ->orderBy('created_at', 'desc');
        } else {
            $commentsQuery
                ->orderBy('created_at', 'desc')
                ->orderBy('id', 'desc');
        }

        $comments = $commentsQuery
            ->paginate(8)
            ->withQueryString();

        return view('forum.index', compact(
            'comments',
            'search',
            'selectedScope',
            'selectedSort',
            'scopeOptions',
            'sortOptions'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rawg_game_id' => 'required|integer',
            'game_name' => 'required|string|max:255',
            'comment' => 'required|string|min:3|max:1000',
        ]);

        GameComment::create([
            'user_id' => auth()->id(),
            'rawg_game_id' => $request->rawg_game_id,
            'game_name' => $request->game_name,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Komentar berhasil dikirim.');
    }

    public function update(Request $request, GameComment $comment)
    {
        if ($comment->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'comment' => 'required|string|min:3|max:1000',
        ]);

        $comment->update([
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Komentar berhasil diperbarui.');
    }

    public function destroy(GameComment $comment)
    {
        if ($comment->user_id !== auth()->id()) {
            abort(403);
        }

        $comment->delete();

        return back()->with('success', 'Komentar berhasil dihapus.');
    }
}