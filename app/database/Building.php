<?php
namespace App\Database;
use Illuminate\Database\Capsule\Manager as Capsule;

class Building
{
    public static function migrate()
    {
        Capsule::schema()->create('buildings', function ($table) {

            $table->id();
        
            $table->string('name');
                
            $table->timestamps();
        });        
    }
}