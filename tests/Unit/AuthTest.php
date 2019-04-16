<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    /**
     * @test 
     * Test registration
     */
    public function test_register(){
        $data = [
            'email' => 'test@gmail.com',
            'name' => 'Test',
            'password' => 'secret1234',
            'password_confirmation' => 'secret1234',
        ];
        $response = $this->json('POST', '/api/auth/register', $data);
        $response->assertStatus(201);
        $this->assertArrayHasKey('token', $response->json());
        User::where('email','test@gmail.com')->delete();
    }

    /**
     * @test
     * Test login
     */
    public function test_login()
    {
        User::create([
            'name' => 'test',
            'email'=>'test@gmail.com',
            'password' => bcrypt('secret1234')
        ]);
        $response = $this->json('POST', '/api/auth/login' ,[
            'email' => 'test@gmail.com',
            'password' => 'secret1234',
        ]);
        $response->assertStatus(200);
        $this->assertArrayHasKey('token',$response->json());
        User::where('email','test@gmail.com')->delete();
    }

    /**
     * @test
     * Test logout
     */
    public function test_logout()
    {
        User::create([
            'name' => 'test',
            'email'=>'test@gmail.com',
            'password' => bcrypt('secret1234')
        ]);
        $response = $this->json('POST', '/api/auth/login' ,[
            'email' => 'test@gmail.com',
            'password' => 'secret1234',
        ]);
        $response->assertStatus(200);

        $token = json_decode($response->getContent(), true)['token'];
        // $this->refreshApplication();
        // $selfQueryResponse =  $this->withHeaders(['Authorization' => 'Bearer ' . $token])->json('POST', '/api/auth/me');
        // $selfQueryResponse->assertStatus(200);

        // # Refresh token
        // $this->refreshApplication();
        // $tokenRefreshResponse = $this->withHeaders(['Authorization' => 'Bearer ' . $token])->json('POST', '/api/auth/refresh');
        // $tokenRefreshResponse->assertStatus(200);
        //$this->refreshApplication();
        //$newToken = json_decode($tokenRefreshResponse->getContent(), true)['token'];

        # Logout
        $logoutResponse = $this->withHeaders(['Authorization' => 'Bearer ' . $token])->json('POST', '/api/auth/logout');
        $logoutResponse->assertStatus(200);

        # Now you cannot query yourself
        $loggedOutTestQuery =$this->withHeaders(['Authorization' => 'Bearer ' . $token])->json('POST', '/api/auth/me');
        $loggedOutTestQuery->assertStatus(401);
    }
}
