<?php

namespace App\Domain\Common\Exception\Http;

use App\Domain\Common\Exception\DomainException;

abstract class HttpException extends DomainException
{
    abstract public function getStatusCode() : int;

}
