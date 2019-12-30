<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest", [
            "only" => "create"
        ]);
    }

    public function create()
    {
        return view("sessions.create");
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
                'email' => 'required|email|max:255',
                'password' => 'required'
            ]
        );

        if(Auth::attempt($credentials, $request->has("remember")))
        {
            if(Auth::user()->activated == true)
            {
                session()->flash("success", "Logged in successfully! ");
                return redirect()->intended(route('users.show', Auth::user()));
            }
            else
            {
                Auth::logout();
                session()->flash("warning", "Please confirm your email first. ");
                return redirect("/");
            }
        }
        else
        {
            session()->flash("danger", "Invalid username or password. ");
            return redirect()->back()->withInput();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash("success", "Logged out successfully. ");
        return redirect()->route("login");
    }
}
