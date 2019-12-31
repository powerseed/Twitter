<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
           'only' => ['store', 'destroy']
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140'
        ]);

        Auth::user()->statuses()->create([
            'content' => $request['content']
        ]);

        session()->flash("success", "Posted successfully. ");
        return redirect()->back();
    }

    public function destroy(Status $status)
    {

    }
}
