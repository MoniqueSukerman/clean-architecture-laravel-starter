<?php

namespace App\Domain\Common\Exception\Http;

use App\Domain\Common\ValueObject\Http\HttpCode;

class BadRequestException extends HttpException
{
    public function getStatusCode() : int
    {
        return HttpCode::BAD_REQUEST->value;
    }

}
