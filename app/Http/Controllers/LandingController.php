<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Chanson;
use App\User;

class LandingController extends Controller
{

    public function index(Request $req) {
        // Using table model to fetch data
        $tracks = Chanson::paginate(10);
        $users = User::paginate(10);

        $currentTrack = session('currentTrack');

        return view('landing.index', ['popular_tracks' => $tracks, 'recent_tracks' => $tracks, 'users' => $users, 'currentTrack' => $currentTrack]);
    }

    public function about() {
        return view('landing.about');
    }

    public function setCurrentTrack(Request $req) {
        $track = $req->track;

        $req->session()->forget('currentTrack');
        $req->session()->push('currentTrack', $track);
        
        $track = $req->session()->get('currentTrack');

        return response()->json(['success' => $track]);
    }
}
