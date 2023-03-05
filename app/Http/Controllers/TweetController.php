<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TweetRequest;
use App\Models\Tweet;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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

    public function create()
    {
        return view('tweets.create');
    }

    public function store(TweetRequest $request)
    {

            // On crée un nouvel article
    $tweets = Tweet::make();

    // On ajoute les propriétés de l'article
    $tweets->text = $request->validated()['text'];
    $tweets->user_id = Auth::id();


    // Si il y a une image, on la sauvegarde
    if ($request->hasFile('img')) {
        $path = $request->file('img')->store('tweets', 'public');
        $tweets->img = $path;
    }

    // On sauvegarde l'article en base de données
    $tweets->save();

    return redirect()->route('index');
    }

    public function like($id) {
        $tweet = Tweet::findOrFail($id);
        $user = auth()->user();

        // Vérifie si l'utilisateur a déjà aimé ce tweet
        if($user->likes()->where('tweet_id', $tweet->id)->exists()){
            return back();
        }

        $like = new Like;
        $like->user_id = $user->id;

        $tweet->likes()->save($like);

        return back();
    }







}
