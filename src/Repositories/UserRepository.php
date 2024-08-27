<?php

namespace Morenorafael\PruebaTecnicaPhpRafaelmoreno\Repositories;

use Morenorafael\PruebaTecnicaPhpRafaelmoreno\Contracts\UserRepositoryInterface;
use Morenorafael\PruebaTecnicaPhpRafaelmoreno\Exceptions\UserDoesNotExistException;
use Morenorafael\PruebaTecnicaPhpRafaelmoreno\Models\User;

class UserRepository implements UserRepositoryInterface
{
    private array $users = [];

    private int $nextId = 1;

    public function getByIdOrFail(int $id): User
    {
        if (isset($this->users[$id])) {
            return $this->users[$id];
        }

        throw(new UserDoesNotExistException($id));
    }

    public function all(): array
    {
        return $this->users;
    }

    public function save(User $user): User
    {
        $user->setId($this->nextId++);
        $this->users[$user->getId()] = $user;

        return $this->users[$user->getId()];
    }

    public function update(User $user): User
    {
        $user = $this->getByIdOrFail($user->getId());

        $this->users[$user->getId()] = $user;

        return $this->users[$user->getId()];
    }

    public function delete(User $user): void
    {
        $user = $this->getByIdOrFail($user->getId());

        unset($this->users[$user->getId()]);
    }
}