<?php

namespace Tests\Unit;

use App\User;
use App\Robot;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FightTest extends TestCase
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
     * Test Fight with other Robot 
     */
    public function test_can_get_fight_robots()
    {
        $token = $this->authenticate();

        $ownRobot = factory(Robot::class)->create(['user_id' => $this->user->id, 'created_by' => $this->user->id, 'updated_by' => $this->user->id]);

        $otherUser = factory(User::class)->create();
        $otherRobot = factory(Robot::class)->create(['user_id' => $otherUser->id, 'created_by' => $otherUser->id, 'updated_by' => $otherUser->id]);
        
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])->json('POST', '/api/v1/start-fight', ['contestant_robot_id' => $ownRobot->id, 'opponent_robot_id' => $otherRobot->id]);
        $response->assertStatus(201);
        $this->assertEquals(2, count($response->json()['data']['fight_detail']));
    }
}
