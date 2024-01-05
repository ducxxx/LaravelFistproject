<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * @param $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return User::where('username', $username)->first();
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        $user = User::where('id',$id)->first();
        $user->update($data);

        return $user;
    }
}
