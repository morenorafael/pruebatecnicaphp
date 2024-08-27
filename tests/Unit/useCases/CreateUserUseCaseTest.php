<?php

namespace Tests\Unit\UseCases;

use Morenorafael\PruebaTecnicaPhpRafaelmoreno\Exceptions\UserDoesNotExistException;
use Morenorafael\PruebaTecnicaPhpRafaelmoreno\Repositories\UserRepository;
use Morenorafael\PruebaTecnicaPhpRafaelmoreno\UseCases\CreateUserUseCase;
use Tests\TestCase;

class CreateUserUseCaseTest extends TestCase
{
    public function test_execute(): void
    {
        //Given
        $userRepository = new UserRepository();
        $useCase = new CreateUserUseCase($userRepository);

        // When
        $useCase->execute('Rafael Moreno', 'user@mail.com', 'password');

        $user = $userRepository->getByIdOrFail(1);

        //Then
        $this->assertEquals('Rafael Moreno', $user->getName());
        $this->assertEquals('user@mail.com', $user->getEmail());
        $this->assertTrue($user->isValidPassword('password'));
    }

    public function test_execute_without_user(): void
    {
        $this->expectException(UserDoesNotExistException::class);

        //Given
        $userRepository = new UserRepository();
        new CreateUserUseCase($userRepository);

        // When

        $userRepository->getByIdOrFail(1);

        //Then
    }
}