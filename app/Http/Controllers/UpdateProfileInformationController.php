<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateProfileInformationController extends Controller
{
    public function edit()
    {
        return view('users.edit');
    }

    public function update(Request $request)
    {
        $attribute = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'username' => ['required', 'alpha_num', 'unique:users,username,' . auth()->id()],
            'email' => ['required', 'string', 'unique:users,email,' . auth()->id(), 'email', 'min:3', 'max:255'],
        ]);

        auth()->user()->update($attribute);

        return redirect()
            ->route('profile', auth()->user()->username)
            ->with('success', 'Your profile has been updated.');
    }
}
