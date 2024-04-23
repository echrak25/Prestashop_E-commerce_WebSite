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

class PhRbcDefine
{
    public $context;
    public $module;
    public static $instance = null;

    public function __construct($module = null)
    {
        if (!(is_object($module)) || !$module) {
            $module = Module::getInstanceByName('ph_recommendbycategories');
        }
        $this->module = $module;
        $context = Context::getContext();
        $this->context = $context;
    }

    public function l($string, $locale = null)
    {
        return Translate::getModuleTranslation('ph_recommendbycategories', $string, pathinfo(__FILE__, PATHINFO_FILENAME),null,false,$locale);
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
            self::$instance = new PhRbcDefine();
        }
        return self::$instance;
    }

    public function getFormFields()
    {
        return array(
            'PH_RBC_TITLE' => array(
                'name' => 'PH_RBC_TITLE',
                'label' => $this->l('Title'),
                'type' => 'text',
                'validate' => 'isString',
                'default' => $this->l('Other products you may be interested in'),
                'lang' => true,
                'col' => 3,
                'message' => array(
                    'validate' => $this->l('Title is not valid'),
                ),
                'desc' => $this->l('Leave blank to use the default title'),
            ),
            'PH_RBC_NB_PROD_DISPLAYED' => array(
                'name' => 'PH_RBC_NB_PROD_DISPLAYED',
                'label' => $this->l('Number of products to display'),
                'type' => 'text',
                'required' => true,
                'validate' => 'isUnsignedInt',
                'desc' => $this->l('Main category of the product is prioritized. If number of products is insufficient, module will try to append products from minor categories.'),
                'col' => 3,
                'default' => 4,
                'message' => array(
                    'required' => $this->l('The number products to display is required'),
                    'validate' => $this->l('The number products to display must be an integer'),
                ),
            ),

            'PH_RBC_2ND_CATEGORY' => array(
                'name' => 'PH_RBC_2ND_CATEGORY',
                'label' => $this->l('Minor category IDs'),
                'type' => 'text',
                'validate' => 'isString',
                'desc' => $this->l('Enter category ids separated by a comma, module will append products from these categories when the number of products in main category is insufficient.'),
                'col' => 3,
                'message' => array(
                    'validate' => $this->l('Minor categories are not valid'),
                ),
            ),
            'PH_RBC_2ND_PRODUCTS' => array(
                'name' => 'PH_RBC_2ND_PRODUCTS',
                'label' => $this->l('Minor product IDs'),
                'type' => 'text',
                'validate' => 'isString',
                'desc' => $this->l('Enter product ids separated by a comma, module will append these products when the number of products in main category is insufficient.'),
                'col' => 3,
                'message' => array(
                    'validate' => $this->l('Minor product IDs are not valid'),
                ),
            ),
            'PH_RBC_EXCLUDED_PRODUCTS' => array(
                'name' => 'PH_RBC_EXCLUDED_PRODUCTS',
                'label' => $this->l('Excluded product IDs'),
                'type' => 'text',
                'validate' => 'isString',
                'desc' => $this->l('Enter product ids separated by a comma, these products will not be appended to the product list'),
                'col' => 3,
                'message' => array(
                    'validate' => $this->l('Excluded product IDs is not valid'),
                ),
            ),
            'PH_RBC_EXCLUDE_FREE_PRODUCTS' => array(
                'name' => 'PH_RBC_EXCLUDE_FREE_PRODUCTS',
                'label' => $this->l('Exclude free products'),
                'type' => 'switch',
                'default' => 0,
                'values' => array(
                    array(
                        'value' => 1,
                        'label' => $this->l('Yes'),
                    ),
                    array(
                        'value' => 0,
                        'label' => $this->l('No'),
                    ),
                ),
            ),
            'PH_RBC_RANDOM_ORDER' => array(
                'name' => 'PH_RBC_RANDOM_ORDER',
                'label' => $this->l('Random products'),
                'type' => 'switch',
                'default' => 1,
                'values' => array(
                    array(
                        'value' => 1,
                        'label' => $this->l('Yes'),
                    ),
                    array(
                        'value' => 0,
                        'label' => $this->l('No'),
                    ),
                ),
            ),
            'PH_RBC_ENABLE_SLIDER' => array(
                'name' => 'PH_RBC_ENABLE_SLIDER',
                'label' => $this->l('Enable carousel slider for desktop'),
                'type' => 'switch',
                'default' => 1,
                'values' => array(
                    array(
                        'id' => 'PH_RBC_ENABLE_SLIDER_1',
                        'value' => 1,
                        'label' => $this->l('Yes'),
                    ),
                    array(
                        'id' => 'PH_RBC_ENABLE_SLIDER_0',
                        'value' => 0,
                        'label' => $this->l('No'),
                    ),
                ),
            ),
            'PH_RBC_ENABLE_SLIDER_ON_MOBILE' => array(
                'name' => 'PH_RBC_ENABLE_SLIDER_ON_MOBILE',
                'label' => $this->l('Enable carousel slider for mobile'),
                'type' => 'switch',
                'default' => 1,
                'values' => array(
                    array(
                        'id' => 'PH_RBC_ENABLE_SLIDER_ON_MOBILE_1',
                        'value' => 1,
                        'label' => $this->l('Yes'),
                    ),
                    array(
                        'id' => 'PH_RBC_ENABLE_SLIDER_ON_MOBILE_0',
                        'value' => 0,
                        'label' => $this->l('No'),
                    ),
                ),
            ),

        );
    }
}