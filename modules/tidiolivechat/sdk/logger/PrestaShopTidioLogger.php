<?php

declare(strict_types=1);

class PrestaShopTidioLogger implements TidioLogger
{
    private const INFO_SEVERITY_LEVEL = 1;
    private const ERROR_SEVERITY_LEVEL = 3;

    public function info(string $message, array $data = []): void
    {
        $this->addLog($message, self::INFO_SEVERITY_LEVEL, $data);
    }

    public function error(string $message, array $data = []): void
    {
        $this->addLog($message, self::ERROR_SEVERITY_LEVEL, $data);
    }

    private function addLog(string $message, int $severity, array $data = []): void
    {
        $dataAsJson = !empty($data) ? json_encode($data) : '';
        $message = sprintf('[Tidio] %s %s', $message, $dataAsJson);

        PrestaShopLogger::AddLog($message, $severity, [], null, null, true);
    }
}
