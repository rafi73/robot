<?php

namespace Tests;


use App\User;
use Faker\Factory;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;


abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    use CreatesApplication, DatabaseMigrations;
    protected $faker;
    
    public function setUp() : void
    {
        parent::setUp();
        $this->faker = Factory::create();
    }


    protected function authenticate()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('secret1234'),
        ]);
        $this->user = $user;
        $token = JWTAuth::fromUser($user);
        return $token;
    }
}
