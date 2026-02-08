<?php

namespace App\Domain\Common\ValueObject\Http;

enum HttpCode: int
{
    case OK = 200;
    case CREATED = 201;
    case NO_CONTENT = 204;
    case BAD_REQUEST = 400;
    case NOT_FOUND = 404;
    case INTERNAL_SERVER_ERROR = 500;
}
