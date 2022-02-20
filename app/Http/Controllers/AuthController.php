<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required|string',
    ]);

    $user = User::login($request)->first();
    if ($user && Hash::check($request->password, $user->password)) {
      //create token
      Auth::loginUsingId($user->id);
      $user = Auth::user();
      $token = $user->createToken('screengoApp');
      $data['access_token'] = $token->accessToken;
      $data['user'] = $user;

      return response()->json(['status' => '200', 'data' => $data], 200);
    } else {
      return response()->json(['status' => '400', 'message' => 'username or password invalid!'], 400);
    }
  }
}
