<?php
 
namespace App\Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Capsule\Manager as Capsule;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        Capsule::table('users')->insert([[
            'first_name' => 'Julius',
            'last_name' => 'Caesar',
            'email' => 'veni.vidi.vici@gmail.com',
            'token' => '142594708f3a5a3ac2980914a0fc954f',
        ],[
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'token' => hash("md5", Str::random(10).'@gmail.com'),
        ],[
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'email' => $email = Str::random(10).'@gmail.com',
            'token' => hash("md5", Str::random(10).'@gmail.com'),
        ]]);

        Capsule::table('buildings')->insert([[
            'name' => 'Isaac Newton',
        ],[
            'name' => 'Oscar Wilde',
        ],[
            'name' => 'Charless Darwin',
        ],[
            'name' => 'Benjamin Franklin',
        ],[
            'name' => 'Luciano Pavarotti',
        ]]);

        Capsule::table('departments')->insert([[
            'name' => 'Development',
        ],[
            'name' => 'Accounting',
        ],[
            'name' => 'HR',
        ],[
            'name' => 'Sales',
        ],[
            'name' => 'HQ',
        ],[
            'name' => 'Director',
        ]]);

        Capsule::table('building_department')->insert([[
            'building_id' => 1,
            'department_id' => 1,
        ],[
            'building_id' => 1,
            'department_id' => 2,
        ],[
            'building_id' => 2,
            'department_id' => 3,
        ],[
            'building_id' => 2,
            'department_id' => 4,
        ],[
            'building_id' => 3,
            'department_id' => 5,
        ],[
            'building_id' => 4,
            'department_id' => 1,
        ],[
            'building_id' => 4,
            'department_id' => 4,
        ], [
            'building_id' => 1,
            'department_id' => 6,
        ],[
            'building_id' => 2,
            'department_id' => 6,
        ],[
            'building_id' => 3,
            'department_id' => 6,
        ],[
            'building_id' => 4,
            'department_id' => 6,
        ],[
            'building_id' => 5,
            'department_id' => 6,
        ]]);

        Capsule::table('department_user')->insert([[
            'department_id' => 6,
            'user_id' => 1,
        ],[
            'department_id' => 1,
            'user_id' => 1,
        ],[
            'department_id' => 2,
            'user_id' => 2,
        ],[
            'department_id' => 3,
            'user_id' => 3,
        ],[
            'department_id' => 5,
            'user_id' => 3,
        ]]);


        
    }
}