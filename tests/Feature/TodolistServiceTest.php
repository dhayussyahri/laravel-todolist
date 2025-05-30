<?php

namespace Tests\Feature;

use App\Services\TodolistSerice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistServiceTest extends TestCase
{
    private TodolistSerice $todolistSerice;
    protected function setUp(): void
    {
        parent::setUp();

        $this->todolistSerice = $this->app->make(TodolistSerice::class);
    }

    public function testTodolistNotNull()
    {
        self::assertNotNull($this->todolistSerice);
    }
}
