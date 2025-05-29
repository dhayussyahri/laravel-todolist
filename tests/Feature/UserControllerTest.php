<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage()
    {
        $this->get('/login')
            ->assertSeeText("Login");
    }

    public function testLoginSuccess()
    {
        $this->post('/login', [
            "user" => "dhayus",
            "password" => "rahasia"
        ])->assertRedirect("/")
            ->assertSessionHas("user", "dhayus");
    }
}
