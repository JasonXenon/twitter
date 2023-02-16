<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tweet;

class TweetController extends Controller
{
    public function index()
    {
        $tweets = Tweet::with('User')->paginate(20);

        return view('homepage.index', [
            'tweets' => $tweets,
        ]);
    }
}
