<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' .$user->id,
        ]);

        $user->update($validated);

        return redirect()->route('users.show', $user)->with('success', 'Profile updated successfully.');
    }

    public function destroy(User $user)
    {
        Auth::logout();
        $user->delete();

        return redirect()->route('show.login')->with('success', 'Your account has been deleted successfully.');
    }
}
