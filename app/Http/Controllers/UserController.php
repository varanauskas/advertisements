<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of advertisements made by the user.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function advertisements(User $user)
    {
        $advertisements = $user->advertisements()->orderByDesc('created_at')->paginate(9);
        return view('user.advertisements', compact('user', 'advertisements'));
    }
}
