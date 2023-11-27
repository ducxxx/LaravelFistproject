<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($username, $password)
    {
        // Add any additional logic (e.g., password validation)
        $user = $this->userRepository->findByUsername($username);

        if ($user && password_verify($password, $user->password)) {
            return $user;
        }

        return null;
    }
}
