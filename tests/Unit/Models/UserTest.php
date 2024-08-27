<?php

namespace Tests\Unit\Models;

use Morenorafael\PruebaTecnicaPhpRafaelmoreno\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_set_id(): void
    {
        // Given
        $user = new User();

        // When
        $user->setId(1);

        // Then
        $this->assertEquals(1, $user->getId());
    }
    
    public function test_set_name(): void
    {
        // Given
        $user = new User();

        // When
        $user->setName('Rafael Moreno');

        // Then
        $this->assertEquals('Rafael Moreno', $user->getName());
    }

    public function test_set_email(): void
    {
        // Given
        $user = new User();

        // When
        $user->setEmail('user@mail');

        // Then
        $this->assertEquals('user@mail', $user->getEmail());
    }

    public function test_is_valid_password(): void
    {
        // Given
        $user = new User();

        // When
        $user->setPassword('password');

        // Then
        $this->assertTrue($user->isValidPassword('password'));
    }
}
