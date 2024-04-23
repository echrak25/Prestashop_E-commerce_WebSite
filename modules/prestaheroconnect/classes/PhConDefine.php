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
class PhConDefine
{
    public static $instance;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new PhConDefine();
        }
        return self::$instance;
    }

    public function installDb()
    {
        return Db::getInstance()->execute("
            CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."ph_con_employee_token` (
                  `id_ph_con_employee_token` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                  `id_employee` int(11) UNSIGNED NOT NULL,
                  `token` varchar(255) DEFAULT NULL,
                  `id_user` int(11) DEFAULT NULL,
                  `firstname` varchar(20) DEFAULT NULL,
                  `lastname` varchar(20) DEFAULT NULL,
                  `token_expire_at` DATETIME NULL DEFAULT NULL,
                   PRIMARY KEY (`id_ph_con_employee_token`),
                   UNIQUE KEY (`id_employee`)
        ) ENGINE="._MYSQL_ENGINE_." DEFAULT CHARSET=UTF8");
    }

    public function uninstallDb()
    {
        Configuration::deleteByName('PH_CON_UPGRADE_COUNT_TIME');
        Configuration::deleteByName('PH_CON_UPGRADE_COUNT');
        return Db::getInstance()->execute("DROP TABLE IF EXISTS `"._DB_PREFIX_."ph_con_employee_token`");
    }
    public static function getLinkPrestahero($linkName, $idLang)
    {
        $links = array(
            'my_account' => array(
                'en' => 'https://prestahero.com/en/my-account',
                'fr' => 'https://prestahero.com/fr/mon-compte',
                'it' => 'https://prestahero.com/it/account',
                'es' => 'https://prestahero.com/es/mi-cuenta',
            ),
            'contact_us' => array(
                'en' => 'https://prestahero.com/support-tickets',
                'fr' => 'https://prestahero.com/fr/support-tickets',
                'it' => 'https://prestahero.com/it/support-tickets',
                'es' => 'https://prestahero.com/es/support-tickets',
            ),
        );
        if(!isset($links[$linkName])){
            return null;
        }
        $isoCode = Language::getIsoById($idLang);
        if(isset($links[$linkName][$isoCode]) && $links[$linkName][$isoCode]){
            return $links[$linkName][$isoCode];
        }
        return $links[$linkName]['en'];
    }
}