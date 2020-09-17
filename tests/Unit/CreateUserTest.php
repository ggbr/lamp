<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateUser()
    {
        $response = $this->postJson('/api/user', [
            "name"=> "João Pimenta",
            "cpf"=> "42301479021",
            "email"=> "joao@pimenta.com",
            "password"=> "1234"
        ]);

        $response->assertStatus(201);
    }
}
