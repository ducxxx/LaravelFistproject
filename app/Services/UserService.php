<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

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
        if ($user && Auth::attempt(['username' => $username, 'password' => $password])){
            return Auth::user();
        }
        return null;
    }
}
