<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

        public function show(User $user): View
     {
         // Les tweets publiés par l'utilisateur
         $tweets = Tweet::where('user_id', $user->id)
             ->withCount('likes')
             ->orderByDesc('created_at')
             ->get()
             ;

         // On renvoie la vue avec les données
         return view('profile.show', [
             'user' => $user,
             'tweets' => $tweets
         ]);
     }


    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        $request->validated([
            'avatar' => 'image|mimes: jpg, png, jpeg'
        ]);

        $path = Storage::url($request->file('avatar')->store('images', 'public'));



        $user = $request->user();



        $user->avatar=$path;


        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */



    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
