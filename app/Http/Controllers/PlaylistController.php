<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Playlist;
use App\Chanson;

class PlaylistController extends Controller
{
    public function show($id) {
        $p = Playlist::findOrFail($id);
        return view('playlists.playlist', ['playlist' => $p]);
    }

    public function create(Request $req) {
        $req->validate([
            'playlist_name' => 'required|min:3|max:255',
        ]);

        $p = new Playlist();
        $p->nom = $req->input('playlist_name');
        $p->utilisateur_id = Auth::id();
        $p->save();

        return redirect('/');
    }

    public function addTrack($playlistID, $trackID) {
        
        Chanson::find($trackID)->playlists()->toggle($playlistID);
        return back();
    }
}
