<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('wishlists.index', compact('wishlists'));
    }
}