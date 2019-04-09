<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    protected $user;

    /**
     * Create user and get token
     * @return string
     */
    protected function authenticate(){
        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('secret1234'),
        ]);
        $this->user = $user;
        $token = JWTAuth::fromUser($user);
        return $token;
    }

    /**
     * @test
     * Get Own and other Robots
     */
    public function test_can_get_fight_robots()
    {
        $token = $this->authenticate();
        $otherUser = factory(User::class)->create();
        
        $ownRobots = factory(robot::class, 10)->create(['user_id' => $this->user->id, 'created_by' => $this->user->id, 'updated_by' => $this->user->id]);
        $otherRobots = factory(robot::class, 15)->create(['user_id' => $otherUser->id, 'created_by' => $otherUser->id, 'updated_by' => $otherUser->id]);

        
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])->json('GET', '/api/v1/robots')
                        ->assertStatus(200);

        $this->assertEquals(count($ownRobots), $this->user->robots()->count());
        $this->assertEquals(count($otherRobots), $otherUser->robots()->count());
    }
}
