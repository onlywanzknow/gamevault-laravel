<?php

namespace App\Http\Controllers;

use App\Models\GameComment;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();

        $wishlistCount = Wishlist::where('user_id', $user->id)->count();
        $commentCount = GameComment::where('user_id', $user->id)->count();

        $favoriteCount = Wishlist::where('user_id', $user->id)
            ->where('status', 'Favorit')
            ->count();

        $completedCount = Wishlist::where('user_id', $user->id)
            ->where('status', 'Selesai')
            ->count();

        return view('profile.edit', compact(
            'user',
            'wishlistCount',
            'commentCount',
            'favoriteCount',
            'completedCount'
        ));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'current_password' => 'nullable|required_with:new_password|string',
            'new_password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = strtolower($request->email);

        if ($request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()
                    ->withErrors([
                        'current_password' => 'Password saat ini salah.',
                    ])
                    ->withInput();
            }

            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}