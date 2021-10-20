<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AccessTokensController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'device_name' => ['required'],
        ]);

        $user = User::where('email', $request->email)->orWhere('mobile', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return Response()->json([
                'message' => 'Invalid username and password combination'
            ], 401);
        }
        $abilities = $request->input('abilities', ['*']);
        if ($abilities && is_string($abilities)) {
            $abilities = explode(',', $abilities);
        }
        $token = $user->createToken($request->device_name, $abilities, $request->ip());
        $accessToken = PersonalAccessToken::findToken($token->plainTextToken);
        // $accessToken = $user->tokens()->latest()->first();
        $accessToken->forceFill([
            'ip' => $request->ip(),
        ])->save();
        return Response()->Json([
            'token' => $token->plainTextToken,
            'user' => $user,

        ]);
    }

    public function destroy()
    {
        $user = Auth::guard('sanctum')->user();

        //Rovoke (delete) all users tokens
        //$user->tokens()->delete();

        //Revoke current access Token
        $user->currentAccessToken()->delete();
    }
}
