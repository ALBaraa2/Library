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
        
    }

    public function destroy(User $user)
    {
        Auth::logout();
        $user->delete();

        return redirect()->route('show.login')->with('success', 'Your account has been deleted successfully.');
    }
}
