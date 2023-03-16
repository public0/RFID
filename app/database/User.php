<?php
namespace App\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class User
{
    public static function migrate()
    {
        Capsule::schema()->create('users', function ($table) {

            $table->id();
        
            $table->string('first_name');

            $table->string('last_name');
        
            $table->string('email')->unique();
                
            $table->string('token')->nullable()->unique();
                
            $table->timestamps();
        });        
    }
}