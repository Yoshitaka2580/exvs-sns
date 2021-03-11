<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class MatchingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function index()
    {
        $user = User::where('id', Auth::id())->first();

        $followers = $user->followers->pluck('id');
        $followings = $user->followings->pluck('id');
        $matching_id = User::whereIn('id', $followers)->whereIn('id', $followings)->pluck('id');
        $matching_users = User::whereIn('id', $matching_id)->get();

        $match_users_count = count($matching_users);

        return view('users.chatRoom', [
            'user' => $user,
            'matching_users' => $matching_users,
            'match_users_count' => $match_users_count,
        ]);
    }
}
