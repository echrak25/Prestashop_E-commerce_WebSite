<?php
/**
 * 2013 - 2024 Payplug SAS.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0).
 * It is available through the world-wide-web at this URL:
 * https://opensource.org/licenses/osl-3.0.php
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to contact@payplug.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PayPlug module to newer
 * versions in the future.
 *
 * @author    Payplug SAS
 * @copyright 2013 - 2024 Payplug SAS
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *  International Registered Trademark & Property of Payplug SAS
 */

namespace PayPlug\src\application\adapter;

if (!defined('_PS_VERSION_')) {
    exit;
}

use PayPlug\src\interfaces\ConfigurationInterface;

class ConfigurationAdapter implements ConfigurationInterface
{
    private $configuration;

    public function __construct()
    {
        $this->configuration = new \Configuration();
    }

    public function get($configuration_name)
    {
        // Old PHP configs can't accept $this->classVar::staticMethod()
        // But only $var::staticMethod()
        $config = $this->configuration;

        return $config::get($configuration_name);
    }

    public function updateValue($key, $value)
    {
        $config = $this->configuration;

        return $config::updateValue($key, $value);
    }

    public function deleteByName($key)
    {
        $config = $this->configuration;

        return $config::deleteByName($key);
    }

    public function loadConfiguration()
    {
        $config = $this->configuration;

        return $config::loadConfiguration();
    }
}
