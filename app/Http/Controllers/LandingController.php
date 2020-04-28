<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Chanson;
use App\User;

class LandingController extends Controller
{

    public function index() {
        // Using table model to fetch data
        $tracks = Chanson::paginate(10);
        $users = User::paginate(10);

        $recent_tracks = Chanson::paginate(10)->sortByDesc('created_at');
        $popular_tracks = Chanson::paginate(10)->sortByDesc('likesCount');

        return view('landing.index', ['popular_tracks' => $popular_tracks, 'recent_tracks' => $recent_tracks, 'users' => $users]);
    }

    public function mostRecent() {
            $recent_tracks = Chanson::paginate(10)->orderBy('creation_date');
            return view('landing.index', ['popular_tracks' => $tracks, 'recent_tracks' => $tracks, 'users' => $users]);
    }

    public function mostPopular() {

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
