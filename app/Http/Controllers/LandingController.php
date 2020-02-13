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

    public function newTrack() {
        return view('landing.newtrack');
    }

    public function uploadTrack(Request $req) {
        // Automatically reloads form if it doesn't pass validation
        $req->validate([
            'name' => 'required|min:3|max:255',
            'chanson' => 'required|file',
            'style' => 'required|min:2'
        ]);

        // Generates a random name then moves the file to /uploads/
        $fileName = $req->file('chanson')->hashName();
        $req->file('chanson')->move('uploads/'.Auth::id(), $fileName);

        $c = new Chanson();
        $c->nom = $req->input('name');
        $c->fichier = "/uploads/".Auth::id().'/'.$fileName;
        $c->style = $req->input('style');
        $c->utilisateur_id = Auth::id();
        $c->save(); // INSERT INTO chanson VALUES(NULL...)
        return redirect('/utilisateur/'. Auth::id());
    }

    public function follow($id) {
        Auth::user()->getFollowing()->toggle($id);
        return back();
    }
}
