<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'hook_configurator' shared service.

return $this->services['hook_configurator'] = new \PrestaShop\PrestaShop\Core\Module\HookConfigurator(($this->services['hook_repository'] ?? $this->load('getHookRepositoryService.php')));