<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:70'],
            'email' => ['required', 'email:rfc,dns', 'max:70', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $request->merge(['password' => Hash::make($request->input('password'))]);

        User::create($request->all());

        return response()->json([], Response::HTTP_CREATED);
    }
}
