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

namespace PayPlug\src\models\repositories;

if (!defined('_PS_VERSION_')) {
    exit;
}

class CountryRepository extends QueryRepository
{
    public function __construct($prefix = '', $dependencies = null)
    {
        parent::__construct($prefix, $dependencies);
        $this->table_name = $this->prefix . 'country';
    }

    /**
     * @description Get Iso Code from a given country id
     *
     * @param int $id_country
     *
     * @return string
     */
    public function getIsoCodeByCountry($id_country = 0)
    {
        if (!is_int($id_country) || !$id_country) {
            return '';
        }

        $result = $this
            ->select()
            ->fields('iso_code')
            ->from($this->table_name)
            ->where('id_country = ' . (int) $id_country)
            ->build('unique_value');

        return $result ?: '';
    }
}
