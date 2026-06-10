<?php

namespace App\Http\Controllers;

use App\Models\GameComment;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->get('search', ''));

        $comments = GameComment::with('user')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('game_name', 'like', '%' . $search . '%')
                        ->orWhere('comment', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->get();

        return view('forum.index', compact('comments', 'search'));
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

    public function destroy(GameComment $comment)
    {
        if ($comment->user_id !== auth()->id()) {
            abort(403);
        }

        $comment->delete();

        return back()->with('success', 'Komentar berhasil dihapus.');
    }
}