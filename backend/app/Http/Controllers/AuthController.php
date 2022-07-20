<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');
    $token = Auth::attempt($credentials);

    if (!$token)
      return response()->json(['error' => 'Senha e/ou email incorretos'], 401);

    return $this->respondWithToken($token);
  }

  public function logout()
  {
    Auth::logout();

    return response()->json(['message' => 'Desconectado com sucesso']);
  }

  protected function respondWithToken($token)
  {
    return response()->json([
      'access_token' => $token,
      'token_type' => 'Bearer',
      'expires_in' => Auth::factory()->getTTL() * 60,
      'user' => Auth::user(),
    ]);
  }
}
