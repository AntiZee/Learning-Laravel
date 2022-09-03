<?php

namespace Tests\Feature;

use App\Services\UserService;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;
    protected function setUp(): void
    {
        parent::setUp();
        $this->userService = $this->app->make(UserService::class);
    }
    public function testSample()
    {
        self::assertTrue(true);
    }
    public function testLoginSuccess()
    {
        self::assertTrue($this->userService->login('admin', 'admin0'));
    }
}