<?php

namespace App\Domain\Common\Exception\Http;

use App\Domain\Common\ValueObject\Http\HttpCode;

class NotFoundException extends HttpException
{
    public function getStatusCode() : int
    {
        return HttpCode::NOT_FOUND->value;
    }

}
