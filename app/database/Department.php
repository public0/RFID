<?php
namespace App\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class Department
{
    public static function migrate()
    {
        Capsule::schema()->create('departments', function ($table) {

            $table->id();
        
            $table->string('name');
                        
            $table->timestamps();
        });

        Capsule::schema()->create('building_department', function ($table) {
            $table->id();

            $table->unsignedBigInteger('building_id')->nullable(true)->default(NULL);

            $table->unsignedBigInteger('department_id')->nullable(true)->default(NULL);

            $table->foreign('building_id')->references('id')->on('buildings');

            $table->foreign('department_id')->references('id')->on('departments');

            $table->timestamps();
        });        

        Capsule::schema()->create('department_user', function ($table) {
            $table->id();

            $table->unsignedBigInteger('department_id')->nullable(true)->default(NULL);

            $table->unsignedBigInteger('user_id')->nullable(true)->default(NULL);

            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('department_id')->references('id')->on('departments');

            $table->timestamps();
        });        
    }
}