<?php

declare(strict_types=1);

class TidioApiResponse
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function data(): array
    {
        return $this->data;
    }
}
