<?php

namespace App\Http\Controllers;

use App\Models\GameComment;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Akun berhasil dibuat. Selamat datang di GameVault!');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Login berhasil. Selamat datang kembali!');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->onlyInput('email');
    }

    public function dashboard()
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

        $playingCount = Wishlist::where('user_id', $user->id)
            ->where('status', 'Sedang dimainkan')
            ->count();

        $wantToPlayCount = Wishlist::where('user_id', $user->id)
            ->where('status', 'Ingin dimainkan')
            ->count();

        $progressPercent = 0;

        if ($wishlistCount > 0) {
            $progressPercent = round(($completedCount / $wishlistCount) * 100);
        }

        $recentWishlists = Wishlist::where('user_id', $user->id)
            ->latest()
            ->take(4)
            ->get();

        $recentComments = GameComment::where('user_id', $user->id)
            ->latest()
            ->take(4)
            ->get();

        return view('dashboard', compact(
            'user',
            'wishlistCount',
            'commentCount',
            'favoriteCount',
            'completedCount',
            'playingCount',
            'wantToPlayCount',
            'progressPercent',
            'recentWishlists',
            'recentComments'
        ));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logout berhasil.');
    }
}