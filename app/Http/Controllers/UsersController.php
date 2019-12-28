<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function create()
    {
        return view("users.create");
    }

    public function show(User $user)
    {
        return view("users.show", compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "username" => "required|max:50",
            "email" => "required|unique:users|email|max:255",
            "password" => "required|confirmed|min:6",
        ]);
        return;
    }
}
