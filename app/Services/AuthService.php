<?php

namespace App\Services;

use Hash;
use JWTAuth;
use App\User;

class AuthService 
{
    /**
     * User Registration
     * 
     * @param array $request
     * 
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
}
