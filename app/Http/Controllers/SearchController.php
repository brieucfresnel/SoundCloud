<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Chanson;
use App\User;

class SearchController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search_content');
        $tracks = Chanson::where('nom', 'LIKE', '%'. $search . '%')->get();
        $users = User::where('name', 'LIKE', '%' . $search . '%')->get();

        return view('search.search', ['tracks' => $tracks, 'users' => $users]);
    }

}
