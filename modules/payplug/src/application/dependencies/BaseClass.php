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

namespace PayPlug\src\application\dependencies;

if (!defined('_PS_VERSION_')) {
    exit;
}

use PayPlug\src\application\adapter\TranslationAdapter;

class BaseClass
{
    protected $name;
    protected $payplug;
    private $entity;

    public function setName()
    {
        $this->name = (new \ReflectionClass($this))->getShortName();

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEntity($entity)
    {
        $this->entity = $entity;

        return $this;
    }

    public function getEntity()
    {
        return $this->entity;
    }

    public function l($string)
    {
        $this->setName();

        return TranslationAdapter::translate($this->payplug, $string, $this->getName());
    }
}
