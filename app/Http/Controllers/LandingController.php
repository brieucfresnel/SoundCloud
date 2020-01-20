<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chanson;
use App\User;

class LandingController extends Controller
{
    public function index() {
        // Using table model to fetch data
        $tracks = Chanson::all();
        return view('landing.index', ['tracks' => $tracks]);
    }

    public function about() {
        return view('landing.about');
    }

    public function utilisateur($id) {
        $u = User::findOrFail($id);
        return view('landing.user', ['utilisateur' => $u]);
    }
}
