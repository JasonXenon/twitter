<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tweet;
use App\Models\User;

class TweetController extends Controller
{
    public function index()
    {
        $tweets = Tweet::with('User')->paginate(20);

        return view('homepage.index', [
            'tweets' => $tweets,
        ]);
    }

    public function search(Request $request)
    {
    $query = $request->input('query');

    $tweets = Tweet::where('text', 'like', '%'.$query.'%')->get();
    $users = User::where('name', 'like', '%'.$query.'%')->get();

    return view('search', compact('tweets', 'users', 'query'));
    }

    public function show($id)
    {
    $tweet = Tweet::findOrFail($id);

    return view('tweets.show', compact('tweet'));
    }


}
