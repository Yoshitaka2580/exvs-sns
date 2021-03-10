<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MatchingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function index(string $name)
    {
        $user = User::where('name', $name)->first();

        $followers = $user->followers->pluck('id');
        $followings = $user->followings->pluck('id');
        $matching_id = User::whereIn('id', $followers)->where('id', $followings)->pluck('id');

        $matching_users = User::whereIn('id', $matching_id)->get();

        $match_users_count = count($matching_users);

        return view('users.chatRoom', [
            'user' => $user,
            'matching_users' => $matching_users,
            'match_users_count' => $match_users_count,
        ]);
    }
}
