<?php

namespace App\Services\Implementation;

use App\Services\UserService;

class UserServiceImplementation implements UserService
{
    private array $users = [
        'Alfa' => 'Alfa0',
        'Beta' => 'Beta0',
        'Gamma' => 'Gamma0'
    ];
    function login(string $user, string $pass): bool
    {
        if (!isset($this->users[$user])) {
            return false;
        }
        $correctPass = $this->users[$user];
        return $pass == $correctPass;
    }
}