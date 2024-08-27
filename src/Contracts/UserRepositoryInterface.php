<?php

namespace Morenorafael\PruebaTecnicaPhpRafaelmoreno\Contracts;

use Morenorafael\PruebaTecnicaPhpRafaelmoreno\Models\User;

interface UserRepositoryInterface
{
    public function getByIdOrFail(int $id): User;

    public function save(User $user): User;

    public function update(User $user): User;

    public function delete(User $user): void;
}