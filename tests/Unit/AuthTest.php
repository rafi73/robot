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
    public function testRegister(){
        $data = [
            'email' => 'test@gmail.com',
            'name' => 'Test',
            'password' => 'secret1234',
            'password_confirmation' => 'secret1234',
        ];
        $response = $this->json('POST', '/api/auth/register', $data);
        $response->assertStatus(200);
        $this->assertArrayHasKey('token', $response->json());
        User::where('email','test@gmail.com')->delete();
    }

    /**
     * @test
     * Test login
     */
    public function testLogin()
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
        $this->assertArrayHasKey('access_token',$response->json());
        User::where('email','test@gmail.com')->delete();
    }
}
