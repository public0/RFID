<?php
namespace App\Database;
require __DIR__.'/../../public/index.php';

return new class {
    public function __construct()
    {
        User::migrate();
        Building::migrate();
        Department::migrate();
    }
};