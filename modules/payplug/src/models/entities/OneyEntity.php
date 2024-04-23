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

namespace PayPlug\src\models\entities;

if (!defined('_PS_VERSION_')) {
    exit;
}

use PayPlug\src\exceptions\BadParameterException;

class OneyEntity
{
    /** @var array */
    private $operations;

    /**
     * @param false $oneyXtimes
     *
     * @return array
     */
    public function getOperations($oneyXtimes = false)
    {
        // exclude oney Xtimes  in the checkout only for Belgium clients
        if ($oneyXtimes) {
            foreach ($oneyXtimes as $oney) {
                $result = array_search($oney, $this->operations, true);
                if (false !== $result) {
                    unset($this->operations[$result]);
                }
            }
        }

        return $this->operations;
    }

    /**
     * @param $operations
     *
     * @return $this
     */
    public function setOperations($operations)
    {
        if (!is_array($operations)) {
            throw new BadParameterException('Invalid argument, $operations must be an array');
        }

        $this->operations = $operations;

        return $this;
    }
}
