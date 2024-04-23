<?php

declare(strict_types=1);

interface TidioErrorTranslator
{
    public function translate(string $errorCode): string;
}
