<?php
/**
 * 2007-2022 ETS-Soft
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 wesite only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please contact us for extra customization service at an affordable price
 *
 * @author ETS-Soft <etssoft.jsc@gmail.com>
 * @copyright  2007-2022 ETS-Soft
 * @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */

class PhVpDefine
{
    public $context;
    public $module;
    public static $instance = null;

    public function __construct($module = null)
    {
        if (!(is_object($module)) || !$module) {
            $module = Module::getInstanceByName('ph_viewedproducts');
        }
        $this->module = $module;
        $context = Context::getContext();
        $this->context = $context;
    }

    public function l($string)
    {
        return Translate::getModuleTranslation('ph_viewedproducts', $string, pathinfo(__FILE__, PATHINFO_FILENAME));
    }

    public function display($template)
    {
        if (!$this->module)
            return;
        return $this->module->display($this->module->getLocalPath(), $template);
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new PhVpDefine();
        }
        return self::$instance;
    }

    public function getFormFields()
    {
        return array(
            'PH_VP_TITLE' => array(
                'name' => 'PH_VP_TITLE',
                'label' => $this->l('Title'),
                'type' => 'text',
                'validate' => 'isString',
                'default' => $this->l('Viewed products'),
                'required' => true,
                'lang' => true,
                'col' => 3,
                'message' => array(
                    'validate' => $this->l('Title is not valid'),
                    'required' => $this->l('Title is required'),
                ),
            ),
            'PH_VP_NB_PROD_DISPLAYED' => array(
                'name' => 'PH_VP_NB_PROD_DISPLAYED',
                'label' => $this->l('Number of products to display'),
                'type' => 'text',
                'required' => true,
                'validate' => 'isUnsignedInt',
                'col' => 3,
                'default' => 8,
                'message' => array(
                    'required' => $this->l('The number of products to display is required'),
                    'validate' => $this->l('The number of products to display must be an integer'),
                )
            ),
            'PH_VP_HOOK_DISPLAYED' => array(
                'name' => 'PH_VP_HOOK_DISPLAYED',
                'label' => $this->l('Positions to display'),
                'type' => 'checkbox',
                'default' => '1,5',
            ),
        );
    }

    public function installDb()
    {
        $tblViewedProduct = "CREATE TABLE IF NOT EXISTS `" . _DB_PREFIX_ . "ph_vp_viewed_product` (
            `id_ph_vp_viewed_product` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            `id_customer` INT(10) UNSIGNED NOT NULL,
            `viewed_product` VARCHAR(191) NOT NULL,
            PRIMARY KEY (`id_ph_vp_viewed_product`),
            INDEX (`id_customer`)
        ) ENGINE=" . _MYSQL_ENGINE_ . " DEFAULT CHARSET=UTF8";

        return Db::getInstance()->execute($tblViewedProduct);
    }

    public function uninstallDb()
    {
        return Db::getInstance()->execute("DROP TABLE IF EXISTS `" . _DB_PREFIX_ . "ph_vp_viewed_product`");
    }
}