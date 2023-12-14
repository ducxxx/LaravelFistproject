<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function findByUsername($username)
    {
        return User::where('username', $username)->first();
    }
    public function update($id, array $data)
    {
        $user = User::where('id',$id)->first();
        $user->update($data);

        return $user;
    }
}
