<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    
    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $token = auth()->user()->createToken('API');
        
        return response()->json([
             'token' => $token->plainTextToken
        ], 200);
    }


    public function client()
    {
        return auth()->user();
    }
}
