<?php

declare(strict_types=1);

interface TidioLogger
{
    public function info(string $message, array $data = []): void;

    public function error(string $message, array $data = []): void;
}
