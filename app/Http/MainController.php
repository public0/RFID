<?php
namespace App\Http;

use App;
use App\Container;
use App\Database\Department as DB_DEP;
use App\Database\User as DB_USER;
use App\Database\Building as DB_Building;
use App\Models\Building;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Database\Seeders\DatabaseSeeder;
use App\Exceptions\Container\NotFoundException;

class MainController {
    // public function __construct(private UserRepository $userRepo)
    // {
    // }

    // public function __construct(private UserRepository $userRepo)
    // {
    // }
    public function check()
    {
        if(!isset($_GET['token'])) {
            throw new NotFoundException('Token not found Error!');
        }
        $result = (new Container())->get(UserRepository::class)->check($_GET['token']);
        (new Container())->get(Response::class)->json($result);
    }

    public function register()
    {
        
        // $b = Building::with(['departments'])->get();
        // var_dump($b[0]->departments[1]->name);
        // use DI CONTAINER TO inject userRepository service 
        // $user = User::Create(
        //     [
        //         'name' => "Ahmed Khan",
        //         'email' => "alex2.khan@lbs.com",
        //         'password' => hash("md5",'alex.khan@lbs.com')
        //     ]
        // );
    }

    public function migrate()
    {
        DB_USER::migrate();
        DB_Building::migrate();
        DB_DEP::migrate();

        (new Container())->get(DatabaseSeeder::class)->run();


    }
}
