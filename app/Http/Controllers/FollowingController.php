<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{
    public function __invoke(User $user, $following)
    {
        if ($following != 'follower' && $following != 'following') {
            return redirect(route('profile', $user->username));
        }

        return view('users.following', [
            'follows' => $following == 'following' ? $user->follows : $user->followers,
            'user' => $user,
        ]);
    }

    public function store(Request $request, User $user)
    {
        Auth::user()->hasFollow($user)
            ? Auth::user()->unfollow($user)
            : Auth::user()->follow($user);

        return back()->with('success', 'You are following the user.');
    }
}
