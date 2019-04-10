<?php

namespace App\Http\Controllers;

use Hash;
use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials
     *
     * @return \Illuminate\Http\JsonResponse
     * 
     * @bodyParam email string required The email of the User.
     * @bodyParam password string required The password of the User.
     * 
     * @response 200 {
     *    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9yb2JvdC53b3JrXC9hcGlcL2F1dGhcL3JlZnJlc2giLCJpYXQiOjE1NTQ4ODc1MDQsImV4cCI6MTU1NTEwNzM5NywibmJmIjoxNTU0ODkxMzk3LCJqdGkiOiJaTDdOeVluQ1VUbG5NeTNVIiwic3ViIjoxLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.pWusYGQ32O0fzX1C0c-ZlqugFbA291-wi1DJyzx18BM",
     *  "user": {
     *  "id": 1,
     *   "name": "Antoher Person",
     *   "email": "rafi.aust1@live.com",
     *   "email_verified_at": null,
     *   "created_at": "2019-04-10 19:10:39",
     *   "updated_at": "2019-04-10 19:10:39"
     * },
     * "token_type": "bearer",
     * "expires_in": 216000
     * }
     * @response 401 {
     *    "message": "The given data was invalid"
     * }
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) 
        {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     * 
     * @response 200 {
     *  "id": 1,
     *  "name": "Antoher Person",
     *  "email": "rafi.aust1@live.com",
     *  "email_verified_at": null,
     *  "created_at": "2019-04-10 19:10:39",
     *  "updated_at": "2019-04-10 19:10:39"
     * }
     * @response 401 {
     *    "message": "Unauthenticated"
     * }
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     * 
     * @response 200 {
     *  "message": "Successfully logged out"
     * }
     * @response 422 {
     *    "message": "Unauthenticated"
     * }
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token
     *
     * @return \Illuminate\Http\JsonResponse
     * 
     * @response 200 {
     *    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9yb2JvdC53b3JrXC9hcGlcL2F1dGhcL3JlZnJlc2giLCJpYXQiOjE1NTQ4ODc1MDQsImV4cCI6MTU1NTEwNzM5NywibmJmIjoxNTU0ODkxMzk3LCJqdGkiOiJaTDdOeVluQ1VUbG5NeTNVIiwic3ViIjoxLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.pWusYGQ32O0fzX1C0c-ZlqugFbA291-wi1DJyzx18BM",
     *  "user": {
     *  "id": 1,
     *   "name": "Antoher Person",
     *   "email": "rafi.aust1@live.com",
     *   "email_verified_at": null,
     *   "created_at": "2019-04-10 19:10:39",
     *   "updated_at": "2019-04-10 19:10:39"
     * },
     * "token_type": "bearer",
     * "expires_in": 216000
     * }
     * @response 401 {
     *    "message": "The given data was invalid"
     * }
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'user' => $this->guard()->user(),
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function guard()
    {
        return Auth::Guard('api');
    }

    /**
     * Register a User
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     * 
     * @response 200 {
     *  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9yb2JvdC53b3JrXC9hcGlcL2F1dGhcL3JlZ2lzdGVyIiwiaWF0Ij..."
     * }
     * @response 422 {
     *    "message": "The given data was invalid"
     * }
     */
    public function register(RegisterRequest $request)
    {
        $user =  User::create([
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'password' => Hash::make($request->input('password')),
        ]);

        $token = JWTAuth::fromUser($user);
        return response()->json(compact('token'));
    }
}
