<?php

namespace App\Domain\Exception\Http;

use App\Domain\ValueObject\Http\HttpCode;

class BadRequestException extends HttpException
{
    public function getStatusCode() : int
    {
        return HttpCode::BAD_REQUEST->value;
    }

}
