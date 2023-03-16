<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function check(string $token)
    {
        return User::with(['departments'])->where('token', $token)->first();
    }
    public function register(array $data): User
    {
        return User::Create(
            [
                'name' => "Ahmed Khan",
                'email' => "alex3.khan@lbs.com",
                'password' => hash("md5",'alex.khan@lbs.com')
            ]
        );
    }
}
