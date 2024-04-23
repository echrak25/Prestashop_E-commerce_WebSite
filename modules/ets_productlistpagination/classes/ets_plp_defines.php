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

if (!defined('_PS_VERSION_'))
    exit;

class Ets_plp_defines
{
    public static $instance;
    public function __construct()
    {
        $this->context = Context::getContext();
        if (is_object($this->context->smarty)) {
            $this->smarty = $this->context->smarty;
        }
    }
    public static function getInstance()
    {
        if (!(isset(self::$instance)) || !self::$instance) {
            self::$instance = new Ets_plp_defines();
        }
        return self::$instance;
    }
    public function l($string)
    {
        return Translate::getModuleTranslation('ets_productlistpagination', $string, pathinfo(__FILE__, PATHINFO_FILENAME));
    }
    public function getConfigInputs()
    {
        return array(
            array(
                'type' => 'switch',
                'name' => 'ETS_PLP_ENABLED',
                'label' => $this->l('Enable'),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_PLP_ENABLED_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_PLP_ENABLED_off',
                        'value' => 0,
                    )
                ),
            ), 
            array(
                'type' => 'text',
                'label' => $this->l('Number of products to display'),
                'default' => Configuration::get('PS_PRODUCTS_PER_PAGE'),
                'name' => 'ETS_PLP_PRODUCTS_PER_PAGE',
                'col'=>1,
                'required' => true,
                'validate' => 'isUnsignedInt',
            ),
            array(
                'type' => 'radio',
                'name' => 'ETS_PLP_TYPE_PAGINATION',
                'validate' => 'isCleanHtml',
                'label' => $this->l('How to display when have a large number of products'),
                'default' => 'show_pagination',
                'values' => array(
                    array(
                        'id'=> 'ETS_PLP_TYPE_PAGINATION_show_pagination',
                        'label' => $this->l('Show pagination'),
                        'value'=>'show_pagination',
                    ),
                    array(
                        'id'=> 'ETS_PLP_TYPE_PAGINATION_load_more',
                        'label' => sprintf($this->l('Show %sLoad more%s button'),'"','"'),
                        'value'=>'load_more',
                    ),
                    array(
                        'id'=> 'ETS_PLP_TYPE_PAGINATION_scroll',
                        'label' => $this->l('Scroll to load more products automatically'),
                        'value'=>'scroll',
                    ),
                ),
            ),
            array(
                'type'=> 'text',
                'label' => $this->l('Button label'),
                'name' => 'ETS_PLP_BUTTON_LABEL',
                'required2' => true,
                'lang' => true,
                'default' => $this->l('Load more'),
                'default_lang' => $this->l('Load more'),
                'form_group_class' => 'pagination_type load_more',
                'validate' => 'isCleanHtml'
            ),
            array(
                'type' => 'color',
                'name' => 'ETS_PLP_BUTTON_LABEL_HOVER',
                'label' => $this->l('Button label when hover'),
                'form_group_class' => 'pagination_type show_pagination load_more',
                'validate' => 'isColor',
                'default' => '#ffffff',
            ),
            array(
                'type' => 'color',
                'name' => 'ETS_PLP_BUTTON_BG_HOVER',
                'label' => $this->l('Button background when hover'),
                'form_group_class' => 'pagination_type show_pagination load_more',
                'validate' => 'isColor',
                'default' => '#1d93ab',
            ),
        );
    }
}