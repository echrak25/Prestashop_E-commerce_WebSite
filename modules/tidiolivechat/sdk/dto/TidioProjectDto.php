<?php

declare(strict_types=1);

class TidioProjectDto
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $platform;
    /**
     * @var bool
     */
    private $isInstalled;
    /**
     * @var TidioProjectKeysDto
     */
    private $keys;

    public function __construct(int $id, string $name, string $platform, bool $isInstalled, TidioProjectKeysDto $keys)
    {
        $this->id = $id;
        $this->name = $name;
        $this->platform = $platform;
        $this->isInstalled = $isInstalled;
        $this->keys = $keys;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function platform(): string
    {
        return $this->platform;
    }

    public function isInstalled(): bool
    {
        return $this->isInstalled;
    }

    public function publicKey(): string
    {
        return $this->keys->publicKey();
    }

    public function privateKey(): string
    {
        return $this->keys->privateKey();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'platform' => $this->platform,
            'isInstalled' => $this->isInstalled,
            'publicKey' => $this->keys->publicKey(),
            'privateKey' => $this->keys->privateKey(),
        ];
    }
}
