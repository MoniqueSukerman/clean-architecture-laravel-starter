<?php

namespace App\Domain\Exception\Http;

use App\Domain\Exception\DomainException;

abstract class HttpException extends DomainException
{
    abstract public function getStatusCode() : int;

}
