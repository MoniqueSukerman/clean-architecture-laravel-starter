<?php

namespace App\Domain\Exception\Http;

use App\Domain\ValueObject\Http\HttpCode;

class NotFoundException extends HttpException
{
    public function getStatusCode() : int
    {
        return HttpCode::NOT_FOUND->value;
    }

}
