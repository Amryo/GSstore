<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }


    function user()
    {
        return 'user found';
    }

    public function show($name)
    {
        try {
            $user = User::where('name', $name)->firstOrFail();
        } catch (\Exception $exception) {
            return Redirect()->back();
            //   return view('errors.usernotfound');
        }
        return view('welcome', ['user' => $user]);
    }
}
