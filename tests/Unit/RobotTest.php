<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Robot;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class RobotTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_can_create_robot()
    {
        $token = parent::authenticate();
        $robot = factory(Robot::class)->make()->toArray();
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])->json('POST', '/api/v1/robot', $robot);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'speed',
                    'weight',
                    'power',
                    'created_by',
                    'updated_by'
                ],
                'version',
            ])
            ->assertJson(['data' => $robot, 'version' => '1.0.0']);
    }

    public function test_can_update_robot()
    {
        $token = parent::authenticate();
        $robot = factory(robot::class)->create()->toArray();
        $robot['name'] = $this->faker->name;
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])->json('PUT', '/api/v1/robot/' . $robot['id'] , $robot);

        unset($robot['created_at']);
        unset($robot['updated_at']);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'speed',
                    'weight',
                    'power',
                    'created_by',
                    'updated_by'
                ],
                'version',
            ])
            ->assertJson(['data' => $robot, 'version' => '1.0.0']);
    }

    public function test_can_show_robot()
    {
        $token = parent::authenticate();
        $robot = factory(robot::class)->create()->toArray();
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])->json('GET', '/api/v1/robot/' . $robot['id']);

        unset($robot['created_at']);
        unset($robot['updated_at']);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'speed',
                    'weight',
                    'power',
                    'created_by',
                    'updated_by'
                ],
                'version',
            ])
            ->assertJson(['data' => $robot, 'version' => '1.0.0']);
    }

    public function test_can_delete_robot()
    {
        $token = parent::authenticate();
        $robot = factory(robot::class)->create()->toArray();
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])->json('DELETE', '/api/v1/robot/' . $robot['id']);

        $response->assertStatus(204);
    }

    public function test_can_get_robots()
    {
        $token = parent::authenticate();
        $robots = factory(robot::class, 10)->create();
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])->json('GET', '/api/v1/robots');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [[
                    'id',
                    'name',
                    'speed',
                    'weight',
                    'power',
                    'created_by',
                    'updated_by'
                ]],
                'links' => [
                    'first',
                    'last',
                    'prev',
                    'next',
                ],
                'meta' => [
                    'current_page',
                    'from',
                    'last_page',
                    'path',
                    'per_page',
                    'to',
                    'total',
                ],
            ])
            ->assertJsonCount(count($robots), 'data');
    }

    public function test_can_upload_robots_csv_file()
    {
        $token = parent::authenticate();
        Storage::fake('local');

        $filePath= __DIR__ . '/robot.csv';
        $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                        ->postJson('/api/v1/robot-bulk', ['file' => new UploadedFile($filePath,'robot.csv', null, null, null, true)])
                        ->assertStatus(200);

        Storage::disk('local')->assertExists('robot.csv');
    }
}
