<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Psy\Util\Str;
use Mail;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            "except" => ["create", "show", "store", "index", "confirmEmail"]
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
        $statuses = $user->statuses()->orderBy("created_at", "desc")->paginate(10);

        return view("users.show", compact('user', 'statuses'));
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

        $this->sendEmailConfirmationTo($user);
        session()->flash('success', 'Please check the verification email. ');
        return redirect("/");
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

    public function sendEmailConfirmationTo($user)
    {
        $view = "emails.confirm";
        $data = compact("user");
        $to = $user->email;
        $subject = "Email Confirmation -- Twitter";
        Mail::send($view, $data, function ($message) use ($to, $subject){
            $message->to($to)->subject($subject);
        });
    }

    public function confirmEmail($token)
    {
        $user = User::where("activation_token", $token)->firstOrFail();

        $user->activation_token = null;
        $user->activated = true;
        $user->save();

        Auth::login($user);
        session()->flash("success", "Email confirmed! ");
        return redirect("/");
    }

    public function follow($user_ids)
    {
        $this->followings()->sync($user_ids, false);
    }

    public function unfollow($user_ids)
    {
        $this->followings()->detach($user_ids);
    }

    public function isFollowing($user_id)
    {
        return $this->followings()->contains($user_id);
    }
}
