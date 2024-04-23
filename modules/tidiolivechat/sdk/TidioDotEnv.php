<?php

declare(strict_types=1);

use M1\Env\Parser;

class TidioDotEnv
{
    private const ENV_FILENAME = '.env';

    /**
     * @var string
     */
    private $envDirectoryPath;

    /**
     * @throws TidioDotEnvException
     */
    public function __construct(string $envDirectoryPath)
    {
        if (!is_dir($envDirectoryPath)) {
            throw new TidioDotEnvException('Path must point an env directory');
        }

        $this->envDirectoryPath = $envDirectoryPath;
    }

    /**
     * @throws TidioDotEnvException
     */
    public function load(): void
    {
        $file = sprintf('%s/%s', $this->envDirectoryPath, self::ENV_FILENAME);
        if (!file_exists($file)) {
            return;
        }

        if (!is_readable($file)) {
            throw new TidioDotEnvException(sprintf('%s file is not readable', self::ENV_FILENAME));
        }

        $envs = Parser::parse(file_get_contents($file));
        $this->setEnvs($envs);
    }

    private function setEnvs(array $envs): void
    {
        foreach ($envs as $envName => $envValue) {
            putenv(sprintf('%s=%s', $envName, $envValue));
        }
    }
}
