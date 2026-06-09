<?php

namespace App\Http\Controllers;

use App\Models\GameComment;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $comments = GameComment::with('user')
            ->latest()
            ->get();

        return view('forum.index', compact('comments'));
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