<?php

namespace Morenorafael\PruebaTecnicaPhpRafaelmoreno\UseCases;

use Morenorafael\PruebaTecnicaPhpRafaelmoreno\Contracts\UserRepositoryInterface;
use Morenorafael\PruebaTecnicaPhpRafaelmoreno\Models\User;

class CreateUserUseCase
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(string $name, string $email, string $password): void
    {
        $user = (new User())
            ->setName($name)
            ->setEmail($email)
            ->setPassword($password);

        $this->userRepository->save($user);
    }
}