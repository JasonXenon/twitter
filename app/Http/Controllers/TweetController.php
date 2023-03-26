<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TweetRequest;
use App\Models\Like;
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
    public function index(Request $request) {
        $tweets = Tweet::with('user')->withCount('likes')
        ->where('text', 'LIKE', '%'.$request->query('query').'%')
        ->orWhereHas('user', function ($query) use ($request) {
            $query->where('name', 'LIKE', '%'.$request->query('query').'%');
        })
        ->latest()
        ->paginate(20);
        return view('homepage.index', [
            'tweets' => $tweets,
        ]);
    }

    public function show($id)
    {
        $tweet = Tweet::withCount('likes')->findOrFail($id);

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
        $userId = auth()->id();

        if ($tweet->likes()->where('user_id', $userId)->exists()) {
            return back();
        }

        $like = new Like();
        $like->user_id = $userId;

        $tweet->likes()->save($like);
        return back();
    }
}
