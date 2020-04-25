<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Chanson;
use App\User;

class LandingController extends Controller
{
    public function index() {
        // Using table model to fetch data
        $tracks = Chanson::paginate(10);
        $users = User::paginate(10);
        
        return view('landing.index', ['popular_tracks' => $tracks, 'recent_tracks' => $tracks, 'users' => $users]);
    }

    public function about() {
        return view('landing.about');
    }
}
