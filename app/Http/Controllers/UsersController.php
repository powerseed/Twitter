<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            "except" => ["create", "show", "store", "index"]
        ]);

        $this->middleware("guest", [
           "only" => "create"
        ]);
    }

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

        $user = User::create([
                'name' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

        Auth::login($user);
        session()->flash("success", "Signed up successfully! ");
        return redirect()->route("users.show", compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize("update", $user);
        return view("users.edit", compact("user"));
    }

    public function update(User $user, Request $request)
    {
        $this->authorize("update", $user);
        $this->validate($request,[
            'username' => 'required|max:50',
            'password' => "nullable|min:6|confirmed",
        ]);

        if($request->password)
        {
            $user->update([
                'name' => $request->username,
                'password' => bcrypt($request->password)
            ]);
        }
        else{
            $user->update([
                'name' => $request->username,
            ]);
        }

        session()->flash("success", "Profile updated successfully! ");
        return redirect()->route("users.show", $user->id);
    }

    public function index()
    {
        $users = User::paginate(10);
        return view("users.index", compact("users"));
    }

    public function destroy(User $user)
    {
        $this->authorize("destroy". $user);
        $user->delete();
        session()->flash("success", "User removed successfully. ");
        return back();
    }
}
