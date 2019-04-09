<?php

namespace Tests\Unit;

use App\User;
use App\Robot;
use App\Fight;
use Carbon\Carbon;
use Tests\TestCase;
use App\FightDetail;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
     * Test Latest 5 Fights
     * Test Top 10 Fights
     */
    public function test_can_get_fight_robots()
    {
        $numberOfRecord = 10;
        $token = $this->authenticate();

        $ownRobots = factory(Robot::class, $numberOfRecord)->create(['user_id' => $this->user->id, 'created_by' => $this->user->id, 'updated_by' => $this->user->id]);
        $robotId = 1;
        $fightsHostedByUser = factory(Fight::class, $numberOfRecord)->create(['user_id' => $this->user->id, 'created_by' => $this->user->id, 'updated_by' => $this->user->id])
                                            ->each(function($fight) use(&$robotId){
                                                $fight->fightDetail()->save(factory(FightDetail::class)->make(['fight_id' => $fight->id, 'robot_id' => $robotId, 'date' => today(), 'result' => ($robotId % 2) ? 1 : 0]));
                                                $fight->fightDetail()->save(factory(FightDetail::class)->make(['fight_id' => $fight->id, 'robot_id' => 11, 'date' => today(), 'result' => ($robotId % 2)? 0 : 1]));
                                                $robotId++;
                                            });


        $otherUser = factory(User::class)->create();
        $otherRobots = factory(Robot::class, $numberOfRecord)->create(['user_id' => $otherUser->id, 'created_by' => $otherUser->id, 'updated_by' => $otherUser->id]);
        $robotId = 11;
        $fightsHostedByOtherUser = factory(Fight::class, $numberOfRecord)->create(['user_id' => $otherUser->id, 'created_by' => $this->user->id, 'updated_by' => $this->user->id])
                                            ->each(function($fight) use(&$robotId){
                                                if($robotId > 11)
                                                {
                                                    $fight->fightDetail()->save(factory(FightDetail::class)->make(['fight_id' => $fight->id, 'robot_id' => $robotId, 'date' => today(), 'result' => ($robotId % 2) ? 1 : 0]));
                                                    $fight->fightDetail()->save(factory(FightDetail::class)->make(['fight_id' => $fight->id, 'robot_id' => 1, 'date' => today(), 'result' => ($robotId % 2)? 0 : 1]));
                                                }
                                                $robotId++;
                                            });
        
        $response = $this->json('GET', '/api/v1/home')->assertStatus(200);

        $this->assertEquals(5, count($response->json()['latest']));
        $this->assertEquals(10, count($response->json()['top']));
    }
}
