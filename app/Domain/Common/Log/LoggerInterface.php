<?php

namespace App\Domain\Common\Log;

interface LoggerInterface
{
    public function info(string $message): void;
    public function error(string $message): void;
}
