<?php

namespace App\Http\Controllers;

use Hash;
use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * The robot Service instance.
     *
     * @var AuthService
     */
    protected $authService;
    
    /**
     * Create a new AuthController instance
     *
     * @return void
     */
    public function __construct(AuthService $authService = null)
    {
        $this->authService = $authService;
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Login and get JWT via given credentials
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * 
     * @bodyParam email string required The email of the User.
     * @bodyParam password string required The password of the User.
     * 
     * @response 200 {
     *    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9yb2JvdC53b3JrXC9hcGlcL2F1dGhcL3JlZnJlc2giLCJpYXQi...",
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
    public function login() : Response
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
     * @return \Symfony\Component\HttpFoundation\Response
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
    public function me() : Response
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * 
     * @response 200 {
     *  "message": "Successfully logged out"
     * }
     * @response 422 {
     *    "message": "Unauthenticated"
     * }
     */
    public function logout() : Response
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * 
     * @response 200 {
     *    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9yb2JvdC53b3JrXC9hcGF1dGhcL3JlZnJlc2giLCJp...",
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
    public function refresh() : Response
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function respondWithToken(string $token) : Response
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
     * Register an User
     * @param RegisterRequest $request
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     * 
     * @response 200 {
     *  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9yb2JvdC53b3JrXC9hcGlcL2F1dGhcL3JlZ2lzdGVyIiwiaWF0Ij..."
     * }
     * @response 422 {
     *    "message": "The given data was invalid"
     * }
     */
    public function register(RegisterRequest $request) : Response
    {
        $token = $this->authService->register($request->all());
        return response()->json(['token' => $token], 201);
    }
}
