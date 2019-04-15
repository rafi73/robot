<?php

namespace App\Services;

use Hash;
use JWTAuth;
use App\User;
use App\Services\JWTGuard;
use Illuminate\Support\Facades\Auth;


class AuthService 
{
    /**
     * User Registration
     * 
     * @param array $request
     * @return string
     */
    public function register(array $request) : string
    {
        $user =  User::create([
            'name' => $request['name'],
            'email' => strtolower($request['email']),
            'password' => Hash::make($request['password']),
        ]);

        return JWTAuth::fromUser($user);
    }

    /**
     * User Login
     * 
     * @param array $request
     * @return array
     */
    public function login(array $request) : array
    {
        if (! $token = auth('api')->attempt($request)) 
        {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Authenticated User
     * 
     * @return \App\User
     */
    public function me() : User
    {
        return auth('api')->user();
    }

    /**
     * Logout User
     */
    public function logout()
    {
        auth('api')->logout();
    }

    /**
     * Refresh token User
     * 
     * @return array
     */
    public function refresh() : array
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     * @return array
     */
    protected function respondWithToken(string $token) : array
    {
        return [
            'token' => $token,
            'user' => $this->guard()->user(),
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ];
    }

    /**
     * Get the token array structure.
     *
     * @return \App\Services\JWTGuard
     */
    public function guard()
    {
        return Auth::Guard('api');
    }
}
