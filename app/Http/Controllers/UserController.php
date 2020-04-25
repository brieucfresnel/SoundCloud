<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Chanson;

class UserController extends Controller
{
    public function show($id) {
        $u = User::findOrFail($id);
        return view('users.profile', ['user' => $u]);
    }

    public function follow($id) {
        Auth::user()->following()->toggle($id);
        return back();
    }
}
