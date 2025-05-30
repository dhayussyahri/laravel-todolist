<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage()
    {
        $this->get('/login')
        ->assertStatus(200)
            ->assertSeeText("Login");
    }

    public function testExample()
    {
        $reponse = $this->get('/');
        $reponse->assertStatus(200);
    }

    public function testLoginSuccess()
    {
        $this->post('/login', [
            "user" => "dhayus",
            "password" => "rahasia"
        ])->assertRedirect("/")
            ->assertSessionHas("user", "dhayus");
    }

    public function testLoginValidationError()
    {
        $this->post('/login', [])
            ->assertStatus(200)
            ->assertSeeText("User or password is required");
    }

    public function testLoginFailed()
    {
        $this->post('/login', [
            "user" => "wrong",
            "password" => "wrong"
        ])->assertSeeText("User or password is wrong");
    }

    public function testLogout()
    {
        $this->withSession([
            "user" => "dhayus"
        ])->post('/logout')
            ->assertRedirect("/")
            ->assertSessionMissing("user");
    }
}
