<?php

namespace Morenorafael\PruebaTecnicaPhpRafaelmoreno\Exceptions;

use Exception;

class UserDoesNotExistException extends Exception
{
    public function __construct(int $userId)
    {
        return parent::__construct("User with id [{$userId}] does not exist");
    }
}