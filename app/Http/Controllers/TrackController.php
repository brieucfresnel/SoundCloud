<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Chanson;

class TrackController extends Controller
{
    public function newTrack() {
        return view('tracks.newtrack');
    }

    public function like($id) {
        Chanson::find($id)->likes()->toggle(Auth::user()->id);
        return back();
    }

    public function create(Request $req) {
        // Automatically reloads form if it doesn't pass validation
        $req->validate([
            'name' => 'required|min:3|max:255',
            'chanson' => 'required|file',
            'image' => 'required|file',
            'style' => 'required|min:2'
        ]);

        // Generates a random name then moves the file to /uploads/
        $trackFileName = $req->file('chanson')->hashName();
        $imageFileName = $req->file('image')->hashName();
        
        $req->file('chanson')->move('uploads/' . Auth::id(), $trackFileName);
        $req->file('image')->move('uploads/'. Auth::id(), $imageFileName);

        $c = new Chanson();
        $c->nom = $req->input('name');
        $c->fichier = "/uploads/" . Auth::id() . '/' . $trackFileName;
        $c->image = '/uploads/'. Auth::id() . '/' . $imageFileName;
        $c->style = $req->input('style');
        $c->utilisateur_id = Auth::id();

        $c->save(); // INSERT INTO chanson VALUES(...)

        return redirect('/user/'. Auth::id());
    }
}
