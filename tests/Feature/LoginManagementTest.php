<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\LoginManagementService;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginManagementTest extends TestCase
{

    public function testGetUser()
    {
        $email = 'jeffravi@bism.or';
        $loginService = new LoginManagementService();
        $loginService->getUser($email);
        $this->assertTrue(true);
    }
}
