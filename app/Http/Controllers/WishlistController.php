<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('wishlists.index', compact('wishlists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rawg_game_id' => 'required|integer',
            'game_name' => 'required|string|max:255',
            'game_slug' => 'nullable|string|max:255',
            'game_image' => 'nullable|string|max:500',
            'game_rating' => 'nullable|numeric|min:0|max:5',
            'game_released' => 'nullable|date',
            'status' => 'required|string|max:50',
        ]);

        $exists = Wishlist::where('user_id', auth()->id())
            ->where('rawg_game_id', $request->rawg_game_id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Game ini sudah ada di wishlist kamu.');
        }

        Wishlist::create([
            'user_id' => auth()->id(),
            'rawg_game_id' => $request->rawg_game_id,
            'game_name' => $request->game_name,
            'game_slug' => $request->game_slug,
            'game_image' => $request->game_image,
            'game_rating' => $request->game_rating,
            'game_released' => $request->game_released,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Game berhasil ditambahkan ke wishlist.');
    }

    public function updateStatus(Request $request, Wishlist $wishlist)
    {
        if ($wishlist->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|string|in:Ingin dimainkan,Sedang dimainkan,Selesai,Favorit',
        ]);

        $wishlist->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status wishlist berhasil diperbarui.');
    }

    public function destroy(Wishlist $wishlist)
    {
        if ($wishlist->user_id !== auth()->id()) {
            abort(403);
        }

        $wishlist->delete();

        return back()->with('success', 'Game berhasil dihapus dari wishlist.');
    }
}