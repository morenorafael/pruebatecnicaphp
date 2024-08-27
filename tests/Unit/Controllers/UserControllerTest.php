<?php

namespace Tests\Unit\Controllers;

use Morenorafael\PruebaTecnicaPhpRafaelmoreno\Controllers\UserController;
use Morenorafael\PruebaTecnicaPhpRafaelmoreno\Repositories\UserRepository;
use Morenorafael\PruebaTecnicaPhpRafaelmoreno\UseCases\CreateUserUseCase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testCreate(): void
    {
        // Given
        $userRepository = new UserRepository();
        $createUserUseCase = new CreateUserUseCase($userRepository);
        $userController = new UserController($createUserUseCase);

        $requestData = [
            'name' => 'Rafael Moreno',
            'email' => 'user@mail.com',
            'password' => 'password'
        ];
        
        // When
        $userController->create($requestData);

        $user = $userRepository->getByIdOrFail(1);

        // Then
        $this->assertEquals('Rafael Moreno', $user->getName());
        $this->assertEquals('user@mail.com', $user->getEmail());
        $this->assertTrue($user->isValidPassword('password'));
    }
}
