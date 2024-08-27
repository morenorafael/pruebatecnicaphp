<?php

namespace Morenorafael\PruebaTecnicaPhpRafaelmoreno\Controllers;

use Morenorafael\PruebaTecnicaPhpRafaelmoreno\Requests\CreateUserRequest;
use Morenorafael\PruebaTecnicaPhpRafaelmoreno\UseCases\CreateUserUseCase;

class UserController
{
    private CreateUserUseCase $createUserUseCase;

    public function __construct(CreateUserUseCase $createUserUseCase)
    {
        $this->createUserUseCase = $createUserUseCase;
    }

    public function create(array $requestData): void
    {
        $request = new CreateUserRequest(
            $requestData['name'],
            $requestData['email'],
            $requestData['password']
        );

        $this->createUserUseCase->execute(
            $request->getName(),
            $request->getEmail(),
            $request->getPassword()
        );
    }
}