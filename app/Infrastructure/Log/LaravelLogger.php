<?php

namespace App\Infrastructure\Log;

use App\Domain\Log\LoggerInterface;
use Illuminate\Support\Facades\Log;

class LaravelLogger implements LoggerInterface
{

    public function info(string $message): void
    {
        Log::info($message);
    }

    public function error(string $message): void
    {
        Log::error($message);
    }
}
