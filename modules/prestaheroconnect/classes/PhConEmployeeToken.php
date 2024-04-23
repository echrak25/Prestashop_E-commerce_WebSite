<?php
/**
 * 2007-2024 PrestaHero
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 website only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please contact us for extra customization service at an affordable price
 *
 * @author PrestaHero <etssoft.jsc@gmail.com>
 * @copyright  2007-2024 PrestaHero
 * @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of PrestaHero
 */

if (!defined('_PS_VERSION_')) {
    exit;
}
class PhConEmployeeToken extends ObjectModel
{
    public $id_ph_con_employee_token;
    public $id_employee;
    public $token;
    public $id_user;
    public $firstname;
    public $lastname;
    public $token_expire_at;

    public static $definition = array(
        'table' => 'ph_con_employee_token',
        'primary' => 'id_ph_con_employee_token',
        'fields' => array(
            'id_employee' => array(
                'type' => self::TYPE_INT,
                'validate' => 'isUnsignedInt'
            ),
            'token' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isString',
                'allow_null' => true,
            ),
            'id_user' => array(
                'type' => self::TYPE_INT,
                'validate' => 'isUnsignedInt',
                'allow_null' => true,
            ),
            'firstname' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isString',
                'allow_null' => true,
            ),
            'lastname' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isString',
                'allow_null' => true,
            ),
            'token_expire_at' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isDate',
                'allow_null' => true,
            ),
        )
    );

    public static function getToken($id_employee)
    {
        if($id_token = (int)Db::getInstance()->getValue("SELECT id_ph_con_employee_token FROM `"._DB_PREFIX_."ph_con_employee_token` WHERE id_employee=".(int)$id_employee))
            return new PhConEmployeeToken($id_token);
        return false;
    }
}