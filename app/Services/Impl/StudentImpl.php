<?php

namespace App\Services\Impl;

use App\Services\StudentService;

class StudentImpl implements StudentService
{
    private array $users = [
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