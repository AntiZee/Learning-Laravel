<?php

namespace App\Services;

interface StudentService
{
    function login(string $user, string $pass): bool;
}