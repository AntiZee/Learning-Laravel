<?php

namespace App\Services\Impl;

use App\Services\AdminService;

class AdminImpl implements AdminService
{
    private array $users = [
        'admin' => 'admin0'
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