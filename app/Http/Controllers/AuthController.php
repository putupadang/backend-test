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
    if (!$user) {
      return response()->json(['status' => '404', 'message' => 'user not found!'], 404);
    }

    if (Hash::check($request->password, $user->password)) {
      //create token
      Auth::loginUsingId($user->id);
      $user = Auth::user();
      $token = $user->createToken('screengoApp');
      $data['access_token'] = $token->accessToken;
      $data['user'] = $user;

      return response()->json(['status' => '200', 'data' => $data], 200);
    } else {
      return response()->json(['status' => '400', 'message' => 'your password is not valid!'], 400);
    }
  }
}
