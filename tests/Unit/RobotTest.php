<?php

namespace Tests\Feature;

use App\User;
use App\Robot;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class RobotTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use RefreshDatabase;
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
     * Test create a Robot
     */
    public function test_can_create_robot()
    {
        $token = $this->authenticate();
        $robot = factory(Robot::class)->make(['user_id' => $this->user->id])->toArray();

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])->json('POST', '/api/v1/robot', $robot);
        $response->assertStatus(201);

        $count = $this->user->robots()->count();
        $this->assertEquals(1, $count);
    }

     /**
     * @test
     * Test update a Robot
     */
    public function test_can_update_robot()
    {
        $token = $this->authenticate();
        $robot = factory(Robot::class)->create(['user_id' => $this->user->id, 'created_by' => $this->user->id, 'updated_by' => $this->user->id])->toArray();

        $nameToUpdate = $this->faker->name;
        $robot['name'] = $nameToUpdate;
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])->json('PUT', '/api/v1/robot/' . $robot['id'] , $robot);

        $response->assertStatus(200);
        $this->assertEquals($nameToUpdate, $this->user->robots()->first()->name);
    }

    /**
     * @test
     * Test fetch Robots
     */
    public function test_can_show_robot()
    {
        $token =  $this->authenticate();
        $robot = factory(robot::class)->create(['user_id' => $this->user->id, 'created_by' => $this->user->id, 'updated_by' => $this->user->id])->toArray();
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])->json('GET', '/api/v1/robot/' . $robot['id']);

        $response->assertStatus(200);
        $this->assertEquals($robot['name'], $response->json()['data']['name']);
    }

    /**
     * @test
     * Test delete Robots
     */
    public function test_can_delete_robot()
    {
        $token = $this->authenticate();
        $robot = factory(robot::class)->create(['user_id' => $this->user->id, 'created_by' => $this->user->id, 'updated_by' => $this->user->id])->toArray();
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])->json('DELETE', '/api/v1/robot/' . $robot['id']);

        $response->assertStatus(204);
        $this->assertEquals(0, $this->user->robots()->count());
    }

    /**
     * @test
     * Test get Robots
     */
    public function test_can_get_robots()
    {
        $token = $this->authenticate();
        $robots = factory(robot::class, 10)->create(['user_id' => $this->user->id, 'created_by' => $this->user->id, 'updated_by' => $this->user->id]);
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])->json('GET', '/api/v1/robots');

        $response->assertStatus(200);
        $this->assertEquals(10, $this->user->robots()->count());
    }

    /**
     * @test
     * Test importing Robots from CSV file
     */
    public function test_can_upload_robots_csv_file()
    {
        $filePath = storage_path('app/robot.csv');
        $token = $this->authenticate();
        $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                        ->postJson('/api/v1/robot-bulk', ['file' => new UploadedFile($filePath, basename($filePath), null, null, null, true)])
                        ->assertStatus(200);

        $this->assertEquals(count(file($filePath)), $this->user->robots()->count() + 1);
    }

    /**
     * @test
     * Test get own and other Robots to start fight
     */
    public function test_can_get_fight_robots()
    {
        $token = $this->authenticate();
        $otherUser = factory(User::class)->create();
        
        $ownRobots = factory(robot::class, 10)->create(['user_id' => $this->user->id, 'created_by' => $this->user->id, 'updated_by' => $this->user->id]);
        $otherRobots = factory(robot::class, 15)->create(['user_id' => $otherUser->id, 'created_by' => $otherUser->id, 'updated_by' => $otherUser->id]);
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])->json('GET', '/api/v1/fight-robots')->assertStatus(200);

        $this->assertEquals(count($ownRobots), count($response->json()['ownRobots']));
        $this->assertEquals(count($otherRobots), count($response->json()['otherRobots']));
    }
}
