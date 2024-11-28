<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Auth;

class UsersController extends Controller
{
    public function profil(Request $request)
    {
        $user = Auth::user();

        return view('profil', compact('user'));

    }
}
