<?php

namespace App\Domain\Exception\Http;

use App\Domain\ValueObject\Http\HttpCode;

class InternalServerErrorException extends HttpException
{
    public function getStatusCode() : int
    {
        return HttpCode::INTERNAL_SERVER_ERROR->value;
    }

}
