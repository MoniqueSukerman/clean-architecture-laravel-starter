<?php

namespace App\Domain\Common\Exception\Http;

use App\Domain\Common\ValueObject\Http\HttpCode;

class InternalServerErrorException extends HttpException
{
    public function getStatusCode() : int
    {
        return HttpCode::INTERNAL_SERVER_ERROR->value;
    }

}
