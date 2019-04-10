<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Process\Process;


class MakeDocumentation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:documentation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate documentation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = User::where('email', 'test@gmail.com')->first();

        if(!$user)
        {
            $user = User::create([
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => Hash::make('secret1234'),
            ]);
        }
        
        $token = JWTAuth::fromUser($user);
        $process = new Process('php artisan api:generate --header="Authorization: Bearer ' . $token
            . '" --force --output documentation --bindings="user,1|city,London|date,2009-01-01"');
        return $process->run(function ($type, $buffer) {
            echo $buffer;
        });
    }
}
