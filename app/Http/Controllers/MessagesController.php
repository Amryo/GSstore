<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.chat');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',

        ]);
        broadcast(new MessageSent($request->message, Auth::user()));
        return;
    }
}
