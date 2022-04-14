<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use ValidatesRequests;

    public function __invoke(Request $request)
    {

        $credentials = $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::query()->firstWhere('email', $credentials['email']);

        
        if (! $user) {
            return response()->json(['message' => 'invalid credentials'], 401);
        }

        if ($credentials['password'] != $user->password) {
            return response()->json(['message' => 'invalid credentials'], 401);
        }

        $token = $user->createToken('token-name');

        return response()->json(['token' => $token->plainTextToken], 200);
    }
}
