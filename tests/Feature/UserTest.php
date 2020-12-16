<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserTest extends TestCase
{
    public function testExample(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
