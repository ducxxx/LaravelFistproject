<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function login($username, $password)
    {
        // Add any additional logic (e.g., password validation)
        $user = $this->userRepository->findByUsername($username);
        if ($user && Auth::attempt(['username' => $username, 'password' => $password])){
            return true;
        }
        return false;
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function updateUser($id, array $data)
    {
        // You can add any additional business logic here before updating the user.
        return $this->userRepository->update($id, $data);
    }
}
