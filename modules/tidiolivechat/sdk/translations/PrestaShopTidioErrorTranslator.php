<?php

declare(strict_types=1);

class PrestaShopTidioErrorTranslator implements TidioErrorTranslator
{
    private const ERROR_CODE_FALLBACK_MESSAGE = 'An error has occurred. Please try again later.';
    private const ERROR_CODES_MESSAGES = [
        'ERR_INSTALL_INTERRUPTED' => 'The installation process has been interrupted. Please try again later.',
        'ERR_PROJECT_INTEGRATED_WITH_ANOTHER_PLATFORM' => 'The project is already integrated with another platform.',
        'ERR_WRONG_PASSWD' => 'Incorrect password',
        'ERR_INVALID_EMAIL' => 'Invalid email provided',
    ];

    /**
     * @var Module
     */
    private $module;

    public function __construct(Module $module)
    {
        $this->module = $module;
    }

    public function translate(string $errorCode): string
    {
        if (!array_key_exists($errorCode, self::ERROR_CODES_MESSAGES)) {
            return $this->module->l(self::ERROR_CODE_FALLBACK_MESSAGE);
        }

        return $this->module->l(self::ERROR_CODES_MESSAGES[$errorCode]);
    }
}
