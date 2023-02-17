<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($id)
    {
        $user = user::findOrFail($id);

        return view('users.show', [
            'user' => $user,
        ]);
    }

    public function show($id)
{
    $user = User::findOrFail($id);
    $tweets = $user->tweet()->latest()->paginate(10);

    return view('users.show', compact('user', 'tweets'));
}

}
