<?php

namespace App\Services;

interface AdminService
{
    function login(string $user, string $pass): bool;
}