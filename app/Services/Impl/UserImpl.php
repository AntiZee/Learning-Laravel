<?php

namespace App\Services\Impl;

use App\Services\UserService;

class UserImpl implements UserService
{
    private array $users = [
        'admin' => 'admin0',
        'student' => 'student0'
    ];
    function login(string $user, string $pass): bool
    {
        if (!isset($this->users[$user])) {
            return false;
        }
        $correctPass = $this->users[$user];
        return $pass = $correctPass;
    }
}